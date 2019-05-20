import os
import ino_com
import logging
import logging.handlers
import mysql.connector
import sys
import imp

# Initialize logging
LOG_LEVEL = logging.info('LOGGING', 'level')
LOGGER = logging.getLogger('Message')
LOGGER.setLevel(logging.INFO)
formatter = logging.Formatter('|%(asctime)s|%(levelname)-8s|%(name)s|%(message)s')
log_file = logging.handlers.TimedRotatingFileHandler('/var/log/pyscript.log', when='midnight', backupCount=7)
log_file.setLevel(logging.INFO)
log_file.setFormatter(formatter)
LOGGER.addHandler(log_file)

# Only print to console if at DEBUG level
if LOG_LEVEL == 'DEBUG':
    log_console = logging.StreamHandler()
    log_console.setLevel(logging.INFO)
    log_console.formatter(formatter)
    LOGGER.addHandler(log_console)

mydb = mysql.connector.connect(
  host="localhost",
  user="inov",
  passwd="1novSQL!",
  database="inovonics"
)
#mycursor = mydb.cursor()

#log = logging
#logFormat = '%(asctime)-15s %(levelname)s %(threadName)s %(message)s'
#log.basicConfig(format=logFormat, level="DEBUG")

inovonics = ino_com.InovonicsCommunication('/dev/ttyUSB1', LOGGER)
inovonics.start_processing()

while True:
    # Get the next inovoincs event in the queue
    event = inovonics.event_queue.get()
    # Do something with the event
    LOGGER.info(event)
    if "Alarm 1" in event['status']:
        mycursor = mydb.cursor()
        LOGGER.info("******Alarm Detected on Serial Number %s********" % event['uid'])
        mycursor.execute("INSERT INTO devices (serial, state, lastUpdated) VALUES ('%s', 1, now()) ON DUPLICATE KEY UPDATE state=1"% event['uid'])
        mycursor.execute("INSERT INTO reports (starttime, endtime, serial, type, resident, room, bed, state) Select NOW(), NULL, '%s', type, name, room, bed, 'open' FROM dev_type WHERE serial like '%s'"% (event['uid'], event['uid']))
        mycursor.execute("SELECT dev_type.name, dev_type.type FROM dev_type, devices WHERE dev_type.serial=devices.serial AND state = 1")
        result_set = mycursor.fetchall()
        for row in result_set:
            name = row[0]
            alert = row[1]
            print(name)
            print(alert)
            import send_pyfcm
            imp.reload(send_pyfcm)
        mydb.commit()
        mycursor.close()
    elif "Reset" in event['status']:
        mycursor = mydb.cursor()
        LOGGER.info("******Alarm Deactivated on Serial Number %s********" % event['uid'])
        mycursor.execute("INSERT INTO devices (serial, state, lastUpdated) VALUES ('%s', 1, now()) ON DUPLICATE KEY UPDATE state=0"% event['uid'])
        mycursor.execute("UPDATE reports SET state='closed', endtime=now() WHERE serial like '%s' AND state like 'open'"% event['uid'])
        mydb.commit()
        mycursor.close()
    elif "No Change" in event['status']:
        mycursor = mydb.cursor()
        LOGGER.info("****Device Supervision %s" % event['uid'])
        mycursor.execute("INSERT INTO dev_chk_in (device, last_chk_in) VALUES ('%s', now()) ON DUPLICATE KEY UPDATE last_chk_in=now()"% event['uid'])
        mydb.commit()
        mycursor.close()

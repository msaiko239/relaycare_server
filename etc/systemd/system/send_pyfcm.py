from pyfcm import FCMNotification
from __main__ import *
 
push_service = FCMNotification(api_key="AAAAHQAE0uo:APA91bGY_KRfJfKyPG65k9qQKF9AKU52JcdamOpwmghQX2Dl07ALnvVdEnqGhqtlkn844Fs6sJV2_bcTotiuYOmsQSLgrqIL3eob5SoOb1YbilYYb55HOWQKmWtOVmwBQr319W7x7YbT")
 
# OR initialize with proxies
 
#proxy_dict = {
#          "http"  : "http://127.0.0.1",
#          "https" : "http://127.0.0.1",
#        }
#push_service = FCMNotification(api_key="<api-key>", proxy_dict=proxy_dict)
 
# Your api-key can be gotten from:  https://console.firebase.google.com/project/<project-name>/settings/cloudmessaging
 #start below this line
#registration_id = "fT3iDQpF5rl:APA91bF64j5BGtQuvirb93eHs9QjNz8Co1qpCsJuVpguQciJ3vOnRHkx_RcxS8lO1ijQFHFK8RbAl59sNfkE7_sbYxhokcbbv8NteJgWayE0GJZ4uq6upGXxF90goAnhZxlkQePTjPTW"
#registration_id = "ccOwyYgdwmQ:APA91bF5btMIpbozKU0WEzSl580viv3QTekdeHk9SYqrfF4R5r9V7_9gA2vq5YQJaNQb9UZZP29lppXN1S49NA516EjWStsOWZ_qQRp0tZ29RZrEq2g9cz8LucsduAwveA636tTPWK1A"
#registration_id = "fbWjoM1OjSA:APA91bFibdPPSQu2y6ha3yuoFCQh-litDBeXkN6WRdMq7DIZL0PTbHZ8sTsL9LYN3HG2ukORvqGKbzflsN8ZnOgfgEK-M0VrhkbloaoQXe8WuLNUDfZNhNUe4NHQB7Tk1yW4RPS9e9Vd"
registration_id = "fb6DQQDXxTM:APA91bH6CosMUijdUastD2su-2cBMQNNsd_ViF4iC8sDHciYMlau7ydoPgDlAPmLJ4WUZVjU_fCd5K7OQG30Apnxi8FNsSoLZzH2bqQEjaE7Snl8uaRgNblBq8Vm9OMwRX_FH3Q5_XFt"

message_title = name
message_body = alert
default = "Default"
result = push_service.notify_single_device(registration_id=registration_id, message_title=message_title, message_body=message_body, sound=default)
 
print (result)
 
# Send to multiple devices by passing a list of ids.
#registration_ids = ["fbWjoM1OjSA:APA91bFibdPPSQu2y6ha3yuoFCQh-litDBeXkN6WRdMq7DIZL0PTbHZ8sTsL9LYN3HG2ukORvqGKbzflsN8ZnOgfgEK-M0VrhkbloaoQXe8WuLNUDfZNhNUe4NHQB7Tk1yW4RPS9e9Vd", "fenJeS5oSZo:APA91bEk-YgdtYxSPi4LYRehlnjUvYK4y2C3Zpy2h2vrltADQP5Ycd3pKphPfg8AzYEFmV6lkTA40ve-eoztn7c92tQclR1PVON1CVTS1dAdtkYPnpKRWEMgzEQPR37_2gOSHHxcT-9B"]
#message_title = "Matts Test"
#message_body = "Hope you're having fun this weekend, don't forget to check today's news"
#result = push_service.notify_multiple_devices(registration_ids=registration_ids, message_title=message_title, message_body=message_body)
 
#print (result)

#!/usr/bin/env python3 -p

import serial
from time import sleep
import re
import sys
import os
import socket
from datetime import datetime

ser = serial.Serial(
    port='/dev/ttyUSB0',
    baudrate=9600,
    parity='N',
    stopbits=1,
    bytesize=8,
    timeout=1)

while ser.isOpen():
    line = ser.readline()
    print (line)

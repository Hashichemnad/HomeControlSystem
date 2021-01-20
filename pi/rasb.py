import requests
import os
import time
import RPi.GPIO as GPIO
GPIO.setwarnings(False)
state = 1;
GPIO.setmode(GPIO.BOARD)
os.system('flite -t "HOME AUTOMATION ,INITIALISED"'); 
response = requests.get("https://iothome.tk/api/api.php")
data = response.json()

while(state):
    response = requests.get("https://iothome.tk/api/api.php")
    data = response.json()
    for x in data:
        GPIO.setup(x['pin'],GPIO.OUT)
        if (x['status']=='on'):
            GPIO.output(x['pin'],False)
        if (x['status']=='off'):
            GPIO.output(x['pin'],True)
        time.sleep(2); 



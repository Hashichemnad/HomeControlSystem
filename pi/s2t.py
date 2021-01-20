import speech_recognition as sr 
import pyttsx3
import requests
import time

def SpeakText(command): 
      
    engine = pyttsx3.init() 
    engine.say(command)  
    engine.runAndWait() 
    
mic_name = "device 0: ALC3227 Analog [ALC3227 Analog]"
sample_rate = 48000
chunk_size = 2048

r = sr.Recognizer() 
  
mic_list = sr.Microphone.list_microphone_names() 

device_id = 0
  
with sr.Microphone(device_index = device_id, sample_rate = sample_rate,  
                        chunk_size = chunk_size) as source: 
    
    SpeakText('Hai... Am Siri.. ')
    
    while(1): 
        try:
            audio = r.listen(source) 
            text = r.recognize_google(audio)
            if(text=='hey Siri'): 
                time.sleep(1)
                SpeakText('Yes i am listening')
                audio = r.listen(source) 
                text = r.recognize_google(audio)
                text.lower()
                response = requests.get("https://iothome.tk/update.php?command="+text)
                data = response.text;
                if(data =='No Command Found'):
                    SpeakText('Sorry that was an invalid command.. Try again')
                if(data =='Success'):
                    SpeakText('Successfully activated') 
                time.sleep(1)
          
        except sr.UnknownValueError: 
                print("Google Speech Recognition could not understand audio") 
              
        except sr.RequestError as e: 
                print("Could not request results from Google Speech Recognition service; {0}".format(e)) 

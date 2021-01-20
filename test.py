import requests
response = requests.get("https://iothome.tk/update.php?command=hello")
data = response.text;
print(data)

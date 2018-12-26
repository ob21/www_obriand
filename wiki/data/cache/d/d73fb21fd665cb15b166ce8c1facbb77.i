a:3:{i:0;a:3:{i:0;s:14:"document_start";i:1;a:0:{}i:2;i:0;}i:1;a:3:{i:0;s:4:"file";i:1;a:3:{i:0;s:425:"
import requests

url = "https://obriand.fr/data/api.php/records/banqueops"

payload = "{\n\"account\": \"bqe2\",\n\"date\": \"2018-11-23\",\n\"amount\": \"12\",\n\"description\": \"des3\",\n\"tags\": \"tag3,tag4\"\n}"
headers = {
    'cache-control': "no-cache",
    'Postman-Token': "2d8cdca9-07d4-4f98-b2ac-14584cefdccc"
    }

response = requests.request("POST", url, data=payload, headers=headers)

print(response.text)
";i:1;N;i:2;N;}i:2;i:6;}i:2;a:3:{i:0;s:12:"document_end";i:1;a:0:{}i:2;i:6;}}
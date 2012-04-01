

##Tested Environment
- Windows 7
- Windows Live Message (MSN) version 2009 (Build 14.0.8117.416)

##Required Environment
* Python 2.6 
* Pcap version 1.1 for win32-py2.6
* WinPcap 4.1.2
* Appserv 2.5.10

##Package
1. Install **Python 2.6、Pcap 1.1、WinPcap 4.1.2** for python environment
2. Install **Appserv 2.5.10** for php environment 
3. Import **database.sql**, and move listenNet.php、store.php **web root\sniffer** (you can view sniffer's log on web: [http:\\localhost\sniffer\sniffingNet.php])


##原理
MSN是用1863 port，以TCP的方式傳送、接收資料。我們用wireshark找到這點後，用python監聽1863port，並用regex濾出我們想要的訊息(登入訊息及談話內容)。最後存入遠端網頁(測試時是本機)，模擬MSN被惡意軟體監聽的情況。

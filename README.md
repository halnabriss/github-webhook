The scripts in this repo are created by Hadi Alnabriss (alnabris@gmail.com) , you can use them, modify and redistribute without
any legal circumestances or licenses.
This repo includes two scripts, PHP script and Bash script, this readme includes description for the two scripts:
1. The PHP script, includes a webpage that listens to requests from GitHub webhook, this request is recieved by the php page,
   then this page checks the secret configured on both sides, if the secret matches then the php completes working and extracts
   other information from the request, like repo name ( all these values can be customized according to your needs).

2. The Linux bash script runs a simple server using the nc command, when this server recieves requests from the github webhook,
   it reads the POST/GET header, also the extracted data can be customized according to your needs.

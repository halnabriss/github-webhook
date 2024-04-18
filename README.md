The scripts in this repo are created by Hadi Alnabriss (alnabris@gmail.com) , you can use them, modify and redistribute without
any legal circumestances or licenses.
This repo includes two important scripts, PHP script and Bash script:
1.  (php-webhook.php ) The PHP script, includes a webpage that listens to requests from GitHub webhook, this request is recieved by the php page,
   then this page checks the secret configured on both sides, if the secret matches then the php completes working and extracts
   other information from the request, like repo name ( all these values can be customized according to your needs, check the file github-webhook- 
   json-reply-example ).

2. (bash-continue) The Linux bash script runs a simple script that checks if the temp file created by the php script exists, if it exists, then it 
   is going to read the cloning URL, and clone the contents of the github repository to the 'style' directory in our website.

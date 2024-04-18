<?php

//The scripts in this repo are created by Hadi Alnabriss (alnabris@gmail.com) , you can use them, modify and redistribute without
//any legal circumestances or licenses.

//Check the github secret, in this example we assume that the created webhook uses the password 'mypass123'
//We actually check the hashes not the clear text passwords

$secret_sent_from_github = $_SERVER['HTTP_X_HUB_SIGNATURE'];
$true_secret = "sha1=".hash_hmac( 'sha1', file_get_contents('php://input') ,'mypass123');

// If the hashes match that means the password is true, so we continue the procedures, else do nothing
if( $secret_sent_from_github == $true_secret ){


        // Github content type is json, so we need to extract some json values
        $json = file_get_contents('php://input');

        // Decode the JSON to normal array to extract some information
        $json_data = json_decode($json,true);

        //The json retrieved data include many information about the repository, id, name, URL, cloning URL, etc.
        //Now you need to select specific data you need to continue your work after the webhook trigger occurs
        //you can take a look on the file 'github-webhook-json-reply-example' located in the same repo
        //https://github.com/halnabriss/github-webhook/blob/main/github-webhook-json-reply-example
        //you can see the template of the previous file to see which values are important for your case


        // In this example , I will read repository id, repository name, and cloning URL,
        // these information willbe saved to a temporary file './new/repo_info', then these information will be
        // read by a bash script to complete the required procedures, when the bash script is done, file is deleted
        file_put_contents('./new/repo_info', $json_data['repository']['name']."\n");
        file_put_contents('./new/repo_info', $json_data['repository']['full_name']."\n" , FILE_APPEND);
        file_put_contents('./new/repo_info', $json_data['repository']['clone_url']."\n" , FILE_APPEND);



}


?>

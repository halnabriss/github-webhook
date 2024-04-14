<?php
//Check the github secret

$secret_sent_from_github = $_SERVER['HTTP_X_HUB_SIGNATURE'];
$true_secret = "sha1=".hash_hmac( 'sha1', file_get_contents('php://input') ,'mypass123');

if( $secret_sent_from_github == $true_secret ){

  //read data from the request , and save important infotmation to a temp file
  
        file_put_contents('./new/x', $secret_sent_from_github."\n");
        file_put_contents('./new/x', $true_secret."\n" , FILE_APPEND);
        
        // Github content type is json, so we need to extract some json values
        $json = file_get_contents('php://input');

        // Decode the JSON file
        $json_data = json_decode($json,true);

        // read repository id and repository name
        file_put_contents('./new/x', $json_data['repository']['name']."\n" , FILE_APPEND);
        file_put_contents('./new/x', $json_data['repository']['full_name']."\n" , FILE_APPEND);



}


?>

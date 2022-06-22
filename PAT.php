<?php
class PAT{
// Github Connection Params

protected $username = "YOUR USERNAME GOES HERE"; 
protected $personalAccessToken = "YOUR PERSONAL ACCESS TOKEN GOES HERE";
protected $userPasswd;


//GitHub Authentication Connection
function __construct($username = null, $personalAccessToken = null) {
       
    $this->username =  $username;
  $this->personalAccessToken = $personalAccessToken;
  

   
   
}

function setUsername($username){
    $this->username = $username;
    return $this->username;
    
}
function setPassword($personalAccessToken){
    $this->personalAccessToken = $personalAccessToken;
    return $this->personalAccessToken;
    
}



}
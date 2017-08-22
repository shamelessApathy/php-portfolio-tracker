<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

class YahooController extends Controller
{
    //
  public function __construct()
  {
  }
  public function get_quote($symbols)
  {
    $query = 'select * from pm.finance where symbol in (';
    $baseURL = "https://query.yahooapis.com/v1/public/yql?q=";
    // format symbols for query
    $symbols = explode("&", $symbols);
    foreach ($symbols as $symbol)
    {
      $query .= '"' .$symbol.'",';
    }
    $query = substr($query, 0, -1);
    $query .= ')';
    $encoded = urlencode($query);
    // Concatenate baseURL and urlencoded query
    $url = $baseURL . $encoded;
    $this->create_curl($url);
  	
  }
  public function create_curl($url)
  {
    /*$curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
      ));
    $result = curl_exec($curl);*/
    $session = curl_init($url);  
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
    $result = curl_exec($session);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
  }
  public function access_oauth()
  {
    session_start();

$provider = new \Hayageek\OAuth2\Client\Provider\Yahoo([
    'clientId'     => 'dj0yJmk9cEVTdkl0Y2pITnY5JmQ9WVdrOVZYbFNNMVpKTTJVbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD04OQ--',
    'clientSecret' => '4c9b5b2647dd29fe66868d0d10319ba80684e434',
    'redirectUri'  => 'https://example.com/callback-url',
]);

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . $_GET['error']);

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    // If we want to set approve page language (default is 'en-us')
    // $authUrl = $provider->getAuthorizationUrl(['language' => 'zh-tw']);
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);

        //Use these details to create a new profile
        echo 'Name: '.$ownerDetails->getName()."<br>";
      echo 'FirstName: '.$ownerDetails->getFirstName()."<br>";
      echo 'Lastname: '.$ownerDetails->getLastName()."<br>";
    
      echo 'Email: '.$ownerDetails->getEmail()."<br>";
      echo 'Image: '.$ownerDetails->getAvatar()."<br>";    
        
        

    } catch (Exception $e) {

        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());

    }

    
  // Use this to interact with an API on the users behalf
  echo "Token: ". $token->getToken()."<br>";

  // Use this to get a new access token if the old one expires
  echo  "Refresh Token: ".$token->getRefreshToken()."<br>";

  // Number of seconds until the access token will expire, and need refreshing
  echo "Expires:" .$token->getExpires()."<br>";

    
    
}
  }
}

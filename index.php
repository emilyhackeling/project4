<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1678579484-GunxW4dw8Y2f8k5U7yPOi4LtKYCSZy61e02Q5F8",
    'oauth_access_token_secret' => "abYfwWT6AldNi0Cg5rmHWGP5KoHBOEpzylnwMQya1Ush4",
    'consumer_key' => "BWYpOBj4OQ5zOfpryQXB2ANF1",
    'consumer_secret' => "3BJ1G7nJYNTQSIllS41lY24PqKZqDqWq2NooqLlwTTo7p99hEy"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'GET';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response 
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
**/
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23roadtrip';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

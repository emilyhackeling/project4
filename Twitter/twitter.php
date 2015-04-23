<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="tweetLinkIt.js"></script>
    <link rel="stylesheet" type="text/css" href="twitter_style.css">
    
    

   <script>

    function pageComplete(){
        $('.tweet').tweetLinkify();
    }
    </script> 
    
    
</head>    
    
<body>
<div class= "container">
    
    

    
    
<?php
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "1678579484-GunxW4dw8Y2f8k5U7yPOi4LtKYCSZy61e02Q5F8",
    'oauth_access_token_secret' => "abYfwWT6AldNi0Cg5rmHWGP5KoHBOEpzylnwMQya1Ush4",
    'consumer_key' => "BWYpOBj4OQ5zOfpryQXB2ANF1",
    'consumer_secret' => "3BJ1G7nJYNTQSIllS41lY24PqKZqDqWq2NooqLlwTTo7p99hEy"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=%23roadtrip&count=30';

$twitter = new TwitterAPIExchange($settings);
 
$tweetData = json_decode($twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest(),$assoc =TRUE);

            echo $tweetData;
             
        
             foreach($tweetData['statuses'] as $items)
                {
                    $userArray =$items['user'];
                    echo "<img class='twit-img' src='" . $userArray['profile_image_url'] . "' /img>";
                    echo  "<p class='screen-name'>@" . $userArray['screen_name'] . "</p>";
                    echo "<div id='twitter-tweet'> " . $items['text'] . "</div>";
                    
                    echo "<script>pageComplete();</script>";
     
                }
                  
                
                ?>

</div>
</body>

</html>
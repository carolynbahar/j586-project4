<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "188966671-siS7HhaDRcsaWplCxpDotVrhu3medIUkeHqDBXiN",
    'oauth_access_token_secret' => "6UiJmIdGhROf4Lv5f2S201hZZcJVClFA8FVNDiRhxm7FU",
    'consumer_key' => "Mn0uUO2O4fEB5GWK70VazX4oh",
    'consumer_secret' => "x08lmPA6ZKVl5A5NDC6MKKoqFjNo0szfsFXge0htygqx8BZHpI"
);


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23cs15&count=20';

$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/**echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(); **/

$string = json_decode($twitter->setGetfield($getfield)
                      ->buildOauth($url, $requestMethod)
                      ->performRequest(),$assoc = TRUE);
                      
foreach($string['statuses'] as $items)
    {
        $userArray = $items['user'];
        
        echo "<a href='http://www.twitter.com/" . $userArray['screen_name'] . "'><img src='" . $userArray['profile_image_url'] . "'></a>";
        echo $result->$items['profile_image_url'];
        echo "<b>" . $userArray['name'] . "</b> &nbsp; @" . $userArray['screen_name'] . "<br/>";
        echo $items['text'] . "<br/>";
        echo strtotime("dateString") . "<br/>";
        
        echo date( 'm-d H:i:s', strtotime($items['created_at']) ) . "<br/><br/>";

        
        echo "<hr/>";
    }

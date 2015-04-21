<link href="css/twitter-style.css" rel="stylesheet">

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
$getfield = '?q=%23creativesouthga&count=20';

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
        
        echo "<div class='left'><a href='http://www.twitter.com/" . $userArray['screen_name'] . "' target='_blank'><img src='" . $userArray['profile_image_url'] . "' target='_blank'></a></div>";
        echo "<a href='http://www.twitter.com/" . $userArray['screen_name'] . "'>" . $userArray['name'] . " &nbsp; @" . $userArray['screen_name'] . "</a><br/></div>";
        echo $items['text'] . "<br/>";
        echo strtotime("dateString") . "<br/></div>";
        
        echo date( 'm-d H:i:s', strtotime($items['created_at']) ) . "<br/><br/>";

        
        echo "<hr/>";
    }

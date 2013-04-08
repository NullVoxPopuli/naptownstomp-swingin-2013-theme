<?php
/**
* Simple WordPress Twitter feed
*
*
* @param string $hash_tag user of twitter feed to retrieve.
* 
* @return string of formatted API data
*/


function get_tweets($hash_tag) {
    $hashtag = $hash_tag ?: 'lindyhop'; // We search Twitter for the hashtag #php
    $show = 10; // And we want to get 10 tweets
    $cacheFile = 'cache/' . $hashtag .'.json.cache'; // A cachefile will be placed in cache/
    $cacheTime = 1 * 60; // 1 minute cache time

    // If the cache file is newer than our cache time, get the content of it
    if (file_exists($cacheFile) && (time() - $cacheTime < filemtime($cacheFile))) {
        $json = file_get_contents($cacheFile);
    }

    // If it's older, place a new cache file into our cache folder with the JSON result of the twitter search
    else {
        $json = file_get_contents("http://search.twitter.com/search.json?result_type=recent&rpp=$show&q=%23" . $hashtag);
        // $fp = fopen($cacheFile, 'w');
        // fwrite($fp, $json);
        // fclose($fp);
    }

    // Get the results
    $results = json_decode($json)->results;
    $tweets = "";
    foreach($results as $result) {
        $text = $result->text;
        $date = "<span class='tweet_date'>" . date("H:i A - j M y",strtotime($result->created_at)) . "</span>";
        // Links
        $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a class="twitterLink" rel="nofollow" href="$1">$1</a>',$text);
        
        // Users
        $text = preg_replace('/@(\w+)/','<a class="twitterUser" rel="nofollow" href="http://twitter.com/$1">@$1</a>',$text);

        // Hashtags
        $text = preg_replace('/#(\w+)/','<a class="twitterHashTag" rel="nofollow" href="http://twitter.com/search/%23$1">#$1</a>',$text);

        $tweets = "<div class='tweetByTag'>
            <div class='tweet'>
                {$text}
                <div class='tweet-info'>
                    {$date} 
                    <span class='tweet-author'>
                        from <a rel='nofollow' href='http://twitter.com/{$result->from_user_id}'>{$result->from_user_name}</a>
                    </span>

                </div>
            </div>
        </div>";
    } 

    return $tweets;
}

//Usage
$twithashtag = of_get_option('w2f_twitr','twitter');
echo get_tweets($hash_tag= $twithashtag, $count='1');
?>

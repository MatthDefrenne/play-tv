<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;

/**
 * Social TV component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class SocialTv
{
    private $conn;
    private $caching;
    private $channelComponent;

    const URLS_REGEX = "#((?:http|https)://(?:\.?[a-zA-Z0-9][a-zA-Z0-9._-]*)*\.[a-zA-Z0-9-]{2,4}(?:/[^)\]”»…\"\s]*[^,)\]”»….:\"\s]|/)?)#u";
    const HASHTAGS_REGEX = "#(?:^|(?<=\s))\#([^\s\.\#]+\b)#u";
    const USERNAMES_REGEX = "#(?:^|(?<=\s))@([a-zA-Z0-9_-]+\b)#u";
    const DELAY = 240;
    const DAYS = 2;
    const MIN_RETWEETS = 1;

    /**
     * Constructor.
     *
     * @param mixed            $conn             Database connection instance
     * @param mixed            $caching          Caching instance
     * @param ChannelComponent $channelComponent channel Component
     */
    public function __construct($conn, $caching, ChannelComponent $channelComponent)
    {
        $this->conn = $conn;
        $this->caching = $caching;

        $this->channelComponent = $channelComponent;
    }

    /********************/
    /********************/
    /********************/
    /***** PRECACHE *****/
    /********************/
    /********************/
    /********************/

    /**
     * Tweets SQL.
     *
     * @param string $date
     * @param int    $limit
     */
    public function getPrecacheTweetsSql($limit = 30)
    {
        $date = date('Y-m-d H:i:s', time() - static::DELAY);

        $qb = $this->conn->createQueryBuilder();

        return $qb
            ->select(
                'tweets.tweet_id',
                'tweets.reply_to',
                'tweets.date',
                'tweets.retweet',
                'tweets.retweet_count as retweets',
                'tweets.has_url',
                'tweets.parent',
                'tweets.parent_username',
                'tweets.username as author',
                'tweets.image_url',
                'tweets.text',
                'tweets.text_decoded',
                'tweets.parent',
                'tweets.parent_text',
                'tweets.parent_text_decoded',
                'tweets.lang',
                'tweets.display',
                'tweets.update'
            )
            ->from('tw_tweets', 'tweets')
            ->where('tweets.parent IS NULL')
            ->andwhere('tweets.reply_to IS NULL')
            ->andwhere('tweets.display = 1')
            ->andwhere('tweets.retweet = 0')
            ->andwhere($qb->expr()->orx("tweets.lang IN ('fr', 'en')", 'tweets.lang IS NULL'))
            ->andwhere('tweets.date <= :date')
                ->setParameter(':date', $date)
            ->groupby('tweets.tweet_id')
            ->orderby('tweets.date', 'DESC')
            ->addOrderBy('tweets.tweet_id', 'DESC')
            ->setMaxResults($limit);
    }

    /**
     * Precache tweets.
     *
     * @param int $limit
     */
    public function precacheTweets($limit = 30)
    {
        $cacheKey = 'precache_last_tweets';

        $qb = $this->getPrecacheTweetsSql($limit);

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $tweetsFromDb = $this->parseTweets($stmt->fetchAll(\PDO::FETCH_ASSOC));

        if (empty($tweetsFromDb)) {
            return false;
        }

        return $this->caching->set($cacheKey, $tweetsFromDb, 0);
    }

    /**
     * Precache tweets for each channels using rules stored in tw_searchs table.
     *
     * @param int   $limit
     * @param array $socialMosaic
     */
    public function precacheTweetsByChannel($limit = 30, array $socialMosaic)
    {
        foreach ($socialMosaic as $channel) {
            $channelId = $channel['channel_id'];
            $cacheKey = sprintf('precache_tweets_by_channel_%s', $channel['alias']);

            $searchsIds = $this->getSearchsByChannelId($channelId);

            if (false === $searchsIds) {
                continue;
            }

            $qb = $this->getPrecacheTweetsSql($limit)
                ->leftjoin('tweets', 'tw_tweets_assoc', 'tweets_assoc', 'tweets_assoc.tweet_id = tweets.tweet_id')
                ->andwhere(sprintf('tweets_assoc.search_id IN %s', $searchsIds))
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                continue;
            }

            $tweetsFromDb = $this->parseTweets($stmt->fetchAll(\PDO::FETCH_ASSOC));

            if ($this->caching->set($cacheKey, $tweetsFromDb, 0) == false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Precache data for 'soirée de la veille' chart
     * (tweets per minutes).
     *
     * @return bool TRUE if data stored in memcache, otherwise FALSE
     */
    public function precacheTweetsPerMinute()
    {
        $cacheKey = 'tweets_per_minute';

        $date = date('Y-m-d', time() - 86400);
        $fromDate = "{$date} 18:00:00";
        $toDate = "{$date} 23:59:59";

        $tweetsFromDb = $this->getTweetsPerMinuteData($fromDate, $toDate);

        if (null === $tweetsFromDb) {
            return false;
        }

        $tweetsPerMinutes = array();
        foreach ($tweetsFromDb as $tweet) {
            $date = strtotime($tweet['date']);
            $minute = date('Y-m-d H:', $date).floor(date('i', $date) / 10).'0:00';
            $tweetsPerMinutes[$minute] = (isset($tweetsPerMinutes[$minute]) ? $tweetsPerMinutes[$minute] + $tweet['tweets'] : $tweet['tweets']);
        }

        return $this->caching->set($cacheKey, $tweetsPerMinutes, 0);
    }

    /**
     * Get tweets per minute data form database.
     *
     * @param string $fromDate
     * @param string $toDate
     *
     * @return mixed array on success, otherwise null
     */
    public function getTweetsPerMinuteData($fromDate, $toDate)
    {
        $qb = $this->conn->createQueryBuilder();
        $qb
            ->select(
                'date',
                'COUNT(tweets.tweet_id) as tweets'
            )
            ->from('tw_tweets', 'tweets')
            ->where('tweets.date >= :fromDate')
                ->setParameter(':fromDate', $fromDate)
            ->andwhere('tweets.date <= :toDate')
                ->setParameter(':toDate', $toDate)
            ->groupby('tweets.date')
            ->orderby('tweets.date')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Precache most shared URLs in tweets.
     *
     * @param int $limit
     *
     * @return bool true if stored in memcache, otherwise false
     */
    public function precacheMostSharedUrls($limit = 10)
    {
        $cacheKey = 'most_share_urls';

        $date = date('Y-m-d H:i:s', time() - 3600);

        $tweetsFromDb = $this->getMostSharedUrlFromTweetsDatabase($limit, $date);

        if (null === $tweetsFromDb) {
            return false;
        }

        $mostSharedUrls = $mostSharedUrlsTmp = array();

        foreach ($tweetsFromDb as $tweet) {
            preg_match_all(self::URLS_REGEX, $tweet['text_decoded'], $urls);

            if (!isset($urls[0]) || !is_array($urls[0]) || count($urls[0]) === 0) {
                continue;
            }

            $urls = &$urls[0];
            $urlsCount = count($urls);

            for ($j = 0; $j < $urlsCount; ++$j) {
                $retweets = $tweet['retweets'];
                $url = &$urls[$j];
                if (preg_match("#^https?://t\.co/#", $url) === 1) {
                    continue;
                }

                $mostSharedUrlsTmp[$url] = (!isset($mostSharedUrlsTmp[$url]) ? ($retweets + 1) : $mostSharedUrlsTmp[$url] + ($retweets + 1));
            }
        }

        arsort($mostSharedUrlsTmp);

        foreach ($mostSharedUrlsTmp as $url => $count) {
            $mostSharedUrls[] = array(
                'url' => $url,
                'count' => $count,
            );
        }

        if (count($mostSharedUrls) === 0) {
            return false;
        }

        return $this->caching->set($cacheKey, $mostSharedUrls, 0);
    }

    /**
     * Get msot shared url from tweets database.
     *
     * @param int    $limit
     * @param string $date
     *
     * @return mixed array on success, otherwise null
     */
    public function getMostSharedUrlFromTweetsDatabase($limit, $date)
    {
        $qb = $this->getPrecacheTweetsSql($limit)
            ->andwhere('tweets.date >= :fromDate')
                ->setParameter(':fromDate', $date)
            ->andwhere('tweets.text_decoded IS NOT NULL')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Precache trending.
     *
     * @param int $limit, default 50
     *
     * @return bool true with trending posts stored in memcached, otherwise FALSE
     */
    public function precacheTrendingTweets($limit = 50)
    {
        // Cache key
        $cacheKey = 'trending_posts';

        $date = date('Y-m-d H:i:s', time() - 86400);

        $retweetsDb = $this->getTrendingTweetsData($limit, $date);

        if (null === $retweetsDb) {
            return false;
        }

        // Sort retweets
        $retweets = $this->sortRetweets($retweetsDb);

        return $this->caching->set($cacheKey, $retweets, 0);
    }

    /**
     * Get trending data from database.
     *
     * @param int    $limit
     * @param string $date
     *
     * @return mixed array on success, otherwise null
     */
    public function getTrendingTweetsData($limit, $date)
    {
        $qb = $this->getPrecacheTweetsSql($limit)
            ->andwhere('tweets.date >= :fromDate')
                ->setParameter(':fromDate', $date)
            ->andwhere('tweets.retweet_count > 0')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $this->parseTweets($stmt->fetchAll(\PDO::FETCH_ASSOC), static::MIN_RETWEETS);
    }

    /**
     * Precache trending by channel.
     *
     * @param int   $limit,       default 50
     * @param array $socialMosaic
     *
     * @return bool true with trending posts stored in memcached, otherwise FALSE
     */
    public function precacheTrendingTweetsByChannel($limit = 50, array $socialMosaic)
    {
        $date = date('Y-m-d H:i:s', time() - 86400);

        foreach ($socialMosaic as $channel) {
            $channelId = $channel['channel_id'];
            $cacheKey = sprintf('trending_posts_by_channel_%s', $channel['alias']);

            $searchsIds = $this->getSearchsByChannelId($channelId);

            if (false === $searchsIds) {
                continue;
            }

            $retweetsFromDb = $this->getTrendingTweetsDataByChannel($limit, $searchsIds, $date);

            if (null === $retweetsFromDb) {
                continue;
            }

            // Sort retweets
            $retweets = $this->sortRetweets($retweetsFromDb);

            if ($this->caching->set($cacheKey, $retweets, 0) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get trending data by channel from database.
     *
     * @param int    $limit
     * @param string $date
     *
     * @return mixed array on success, otherwise null
     */
    public function getTrendingTweetsDataByChannel($limit, $searchsIds, $date)
    {
        $qb = $this->getPrecacheTweetsSql($limit)
            ->leftjoin('tweets', 'tw_tweets_assoc', 'tweets_assoc', 'tweets_assoc.tweet_id = tweets.tweet_id')
            ->andwhere(sprintf('tweets_assoc.search_id IN %s', $searchsIds))
            ->andwhere('tweets.retweet_count > 0')
            ->andwhere('tweets.date >= :fromDate')
                ->setParameter(':fromDate', $date)
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $this->parseTweets($stmt->fetchAll(\PDO::FETCH_ASSOC), static::MIN_RETWEETS);
    }

    /********************/
    /********************/
    /********************/
    /**** GET TWEETS ****/
    /********************/
    /********************/
    /********************/

    /**
     * Get tweets from memcached.
     *
     * @param int   $limit   maximum tweets count to return
     * @param mixed $sinceId last tweet ID
     *
     * @return mixed last tweets as Array, otherwise NULL
     */
    public function getTweets($limit = 30, $sinceId = null)
    {
        $cacheKey = 'precache_last_tweets';

        $tweets = $this->caching->get($cacheKey);

        if (false === $tweets) {
            return;
        }

        if (null !== $sinceId && isset($tweets[$sinceId])) {
            $key = array_search($sinceId, array_keys($tweets)); // Search sinceId in tweets
            if (0 === $key) {
                return;
            } // No new tweets to return
            $tweets = array_slice($tweets, 0, $key, true); // Remove tweets before sinceId
        }

        return array_values(array_slice($tweets, 0, $limit, true));
    }

    /**
     * Get tweets from memcached.
     *
     * @param int   $limit   maximum tweets count to return
     * @param mixed $sinceId last tweet ID
     *
     * @return mixed last tweets as Array, otherwise NULL
     */
    public function getTweetsByChannel($identifier, $limit = 30, $sinceId = null)
    {
        if (is_numeric($identifier)) {
            $channel = $this->channelComponent->show($identifier);
            $channelAlias = $channel['alias'];
        } else {
            $channelAlias = $identifier;
        }

        $cacheKey = sprintf('precache_tweets_by_channel_%s', $channelAlias);
        $tweets = $this->caching->get($cacheKey);

        if (false === $tweets) {
            return;
        }

        if (null !== $sinceId && isset($tweets[$sinceId])) {
            $key = array_search($sinceId, array_keys($tweets)); // Search sinceId in tweets
            if (0 === $key) {
                return;
            } // No new tweets to return
            $tweets = array_slice($tweets, 0, $key, true); // Remove tweets before sinceId
        }

        return array_values(array_slice($tweets, 0, $limit, true));
    }

    /**
     * Get Tweets per minute.
     *
     * @return mixed data as Array, otherwise NULL
     */
    public function getTweetsPerMinute()
    {
        $cacheKey = 'tweets_per_minute';
        $tweets = $this->caching->get($cacheKey);

        return false === $tweets ? null : $tweets;
    }

    /**
     * Get most shared URLs from memcached.
     *
     * @param int $limit
     *
     * @return mixed URLs as Array, otherwise NULL
     */
    public function getTweetsMostSharedUrls($limit = 10)
    {
        $cacheKey = 'most_share_urls';
        $tweetsMostSharedUrls = $this->caching->get($cacheKey);

        return (false === $tweetsMostSharedUrls) ? null : array_slice($tweetsMostSharedUrls, 0, $limit, true);
    }

    /**
     * Get trending posts.
     *
     * @param int   $limit
     * @param mixed $sinceId
     *
     * @return mixed trending posts as Array, otherwise null
     */
    public function getTrendingPosts($limit = 30, $sinceId = null)
    {
        $cacheKey = 'trending_posts';

        $trendingPosts = $this->caching->get($cacheKey);

        if (false === $trendingPosts) {
            return;
        }

        if (isset($sinceId) && isset($trendingPosts[$sinceId])) {
            $key = array_search($sinceId, array_keys($trendingPosts));
            if (0 === $key) {
                return;
            }

            $trendingPosts = array_slice($trendingPosts, 0, $key, true);
        }

        return array_values(array_slice($trendingPosts, 0, $limit, true));
    }

    /**
     * Get trending posts.
     *
     * @param mixed string|integer îdentifier
     * @param int   $limit
     * @param mixed $sinceId
     *
     * @return mixed trending posts as Array, otherwise null
     */
    public function getTrendingPostsByChannel($identifier, $limit = 30, $sinceId = null)
    {
        if (is_numeric($identifier)) {
            $channel = $this->channelComponent->show($identifier);
            $channelAlias = $channel['alias'];
        } else {
            $channelAlias = $identifier;
        }

        $cacheKey = sprintf('trending_posts_by_channel_%s', $channelAlias);

        $trendingPosts = $this->caching->get($cacheKey);

        if (false === $trendingPosts) {
            return;
        }

        if (isset($sinceId) && isset($trendingPosts[$sinceId])) {
            $key = array_search($sinceId, array_keys($trendingPosts));

            if (0 === $key) {
                return;
            }

            $trendingPosts = array_slice($trendingPosts, 0, $key, true);
        }

        return array_values(array_slice($trendingPosts, 0, $limit, true));
    }

    /**
     * Get searchs by channel.
     *
     * @param int $channelId
     *
     * @return mixed searchs or false
     */
    public function getSearchsByChannelId($channelId)
    {
        // Get search twitter for channel
        $qb = $this->conn->createQueryBuilder();
        $qb
            ->select('searchs.search_id')
            ->from('tw_searchs', 'searchs')
            ->where('searchs.channel_id = :channelId')
                ->setParameter(':channelId', $channelId)
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        $searchs = $stmt->fetchAll(\PDO::FETCH_COLUMN);

        return sprintf('(%s)', implode(',', $searchs));
    }

    /**
     * Parse tweets array.
     *
     * @param array $tweets
     * @param int   $minimumRetweets
     *
     * @return mixed tweets as array, otherwise NULL
     */
    protected function parseTweets($tweets, $minimumRetweets = 0)
    {
        if (empty($tweets)) {
            return;
        }

        $tweetsOutput = array();
        foreach ($tweets as $tweet) {
            if (is_int($minimumRetweets) && $tweet['retweets'] < $minimumRetweets) {
                continue;
            }

            $tweetsOutput[$tweet['tweet_id']] = $this->outputFormatted($tweet);
        }

        return $tweetsOutput;
    }

    /**
     * SocialTv Twitter formatted output.
     *
     * @param array $tweet
     *
     * @return array
     */
    public function outputFormatted($tweet)
    {
        /* In tweet, already have :
         * tweet_id
         * reply_to
         * date
         * retweet
         * retweets
         * has_url
         * parent
         * parent_username
         * author
         * image_url
         * text
         * text_decoded
         * parent
         * parent_text
         * parent_text_decoded
         * lang
         * display
         * update
         */

        $now = time();

        $tweet['id'] = $tweet['tweet_id'];
        $tweet['text'] = (isset($tweet['text_decoded']) ? $tweet['text_decoded'] : $tweet['text']);
        $tweet['text'] = $this->formattedTwitterTextOuput($tweet['text']);

        $tweet['date'] = (strtotime($tweet['date']) + static::DELAY);
        $tweet['since'] = ceil($now - $tweet['date']);

        return $tweet;
    }

    /**
     * Formatted twitter text output by setting HTML tags.
     *
     * @param string $text
     *
     * @return string
     */
    protected function formattedTwitterTextOuput($text)
    {
        $text = trim(strip_tags($text));

        $regexes[] = self::URLS_REGEX;
        $regexes[] = self::HASHTAGS_REGEX; // hashtag
        $regexes[] = self::USERNAMES_REGEX; // username
        $regexes[] = '#\s+(!|\?|\.+|\x85)$#u'; // line ends

        $replacements[] = '<a href="$1" class="link" target="_blank" rel="nofollow" title="$1">$1</a>';
        $replacements[] = '<span class="tweet-hashtag"><span class="diese">#</span><a href="https://twitter.com/search?q=%23$1" target="_blank" rel="nofollow">$1</a></span>';
        $replacements[] = '<span class="tweet-at"><span class="atsign">@</span><a href="https://twitter.com/$1" target="_blank" rel="nofollow">$1</a></span>';
        $replacements[] = '$1';

        preg_match_all(self::URLS_REGEX, $text, $urls);
        $text = preg_replace($regexes, $replacements, $text);

        foreach ($urls as $url) {
            if (!isset($url[0])) {
                continue;
            }
            foreach ($url as $value) {
                if (strlen($value) <= 25) {
                    continue;
                }

                $url_split = str_split($value, 23);
                $text = str_replace(">{$value}<", ">{$url_split[0]}...<", $text);
            }
        }

        return $text;
    }

    /**
     * Sort retweets by DESC.
     *
     * @param array $retweets
     *
     * @return array $retweets
     */
    public function sortRetweets($retweets)
    {
        uasort($retweets, function ($a, $b) {
            return $a['retweets'] < $b['retweets'] ? 1 : -1;
        });

        return $retweets;
    }
}

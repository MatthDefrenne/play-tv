<?php

use PlayTv\Core\Channel\Channel;
use Playmedia\Component\Channel as ChannelComponent;

/**
 * Controller used to display live tweets pages.
 *
 * @author PLAYMEDIA
 */
class live_tweets_controller extends ppl_app_controller
{
    /**
     * On before action.
     *
     * @see ppl_app_controller::before_action()
     */
    public function before_action()
    {
        parent::before_action();
        $this->robots(false);
    }

    /**
     * Display all last tweets or by channel alias.
     *
     * @param string $channel_alias
     */
    public function index_action($channel_alias = null, Channel $channel = null)
    {
        $mosaic = $social_tv_posts = $live_program_by_channel = $most_shared_urls = $tweets_per_minute = null;

        if (null !== $channel) {
            $channelArray = $this->getSdk()['services.channel']->show($channel->getId());

            // Social Tv posts
            $social_tv_posts = $this->social_tv_posts(null, null, $channel);

            $this->set_page_title('Social TV suivez le Live Tweet '.$channelArray['name'].' en direct sur internet');
            $this->set_page_description('Retrouver le Live Tweet '.$channelArray['name'].' avec playtv.fr, votre plateforme de Social TV sur internet.');
        } else {
            // Social Tv posts
            $social_tv_posts = $this->social_tv_posts();

            $this->set_page_title('Derniers tweets Social TV');
        }

        if (false === $this->isMobileLayout()) {
            $mosaic = $this->mosaic('social_tv');
            $most_shared_urls = $this->getSdk()['services.social_tv']->getTweetsMostSharedUrls(5);
            $tweets_per_minute = $this->getSdk()['services.social_tv']->getTweetsPerMinute();

            if (isset($channelArray)) {
                // Add Streamable Key but no need for Account for context = social_tv
                $channelArray = ChannelComponent::getStreamingKeys(
                    $channelArray,
                    $this->container['country_code']
                );

                $live_program_by_channel = $this->live_program_by_channel($channelArray, 'social_tv');
            }
        }

        return $this->render(array(
            'mosaic' => $mosaic,
            'social_tv_posts' => $social_tv_posts,
            'live_program_by_channel' => $live_program_by_channel,
            'most_shared_urls' => $most_shared_urls,
            'tweets_per_minute' => $tweets_per_minute,
        ));
    }

    /**
     * HTTP layer outputing HTML for social tv posts block.
     * Accept both standard and AJAX requests.
     */
    public function block_social_tv_posts_action()
    {
        return $this->handle_block();
    }

    /**
     * HTTP layer outputing HTML for social tv posts block.
     * Accept both standard and AJAX requests.
     *
     * @param Channel $channel
     */
    public function block_social_tv_posts_channel_action(Channel $channel)
    {
        return $this->handle_block($channel);
    }

    protected function handle_block(Channel $channel = null)
    {
        $context = $this->request->query->get('context');
        $sinceId = $this->request->query->get('since_id');

        $html = $this->social_tv_posts($context, $sinceId, $channel);

        $maxAge = 65;
        $this->response->setCache([
            'public' => true,
            'max_age' => $maxAge,
        ]);

        $this->response->write($html);
    }
}

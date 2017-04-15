<?php

namespace Joe\Content\Factory;

use Joe\Content\Scraper\SubscriptionsScraper;
use Joe\User\SubscriptionsContainer;

class SubscriptionsContainerFactory
{

    /**
     * @param array $params
     * @return SubscriptionsContainer
     */
    public function create(array $params = [])
    {
        return (new SubscriptionsContainer($params[''] ?: null))
            ->setBlogSubscriptions($params['blog_subscriptions'] ?: null)
            ->setWardrobeSubscriptions($params['wardrobe_subscriptions'] ?: null)
            ->setSubscribedBlogs($params['subscribed_blogs'] ?: null)
            ->setSubscribedWardrobes($params['subscribed_wardrobes'] ?: null);
    }

    /**
     * @param SubscriptionsScraper $scraper
     * @return SubscriptionsContainer
     */
    public function createFromScraper(SubscriptionsScraper $scraper)
    {
        return $this->create([
            'blog_subscriptions' => $scraper->blogSubscriptions(),
            'wardrobe_subscriptions' => $scraper->wardrobeSubscriptions(),
            'subscribed_blogs' => $scraper->subscribedBlogs(),
            'subscribed_wardrobes' => $scraper->subscribedWardrobes(),
        ]);
    }

}

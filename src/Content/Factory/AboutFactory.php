<?php

namespace Joe\Content\Factory;

use Joe\Content\Scraper\AboutScraper;
use Joe\User\About;

class AboutFactory
{

    /**
     * @param array $params
     * @return About
     */
    public function create(array $params = [])
    {
        return (new About)
            ->setBasicInfo($params['basic'] ?: [])
            ->setHelloMessage($params['hello'] ?: '')
            ->setId($params['user_id'] ?: null)
            ->setLocalization($params['localization'] ?: [])
            ->setProperties($params['properties'] ?: [])
            ->setUser($params['user'] ?: null);
    }

    /**
     * @param AboutScraper $scraper
     * @return About
     */
    public function createFromScraper(AboutScraper $scraper)
    {
        return $this->create([
            'user_id' => $scraper->getUserId(),
            'basic' => $scraper->getBasicInfo(),
            'properties' => $scraper->getCategorisedInfo(),
            'hello' => $scraper->getHelloMessage(),
            'localization' => $scraper->getLocalization(),
            'user' => $scraper->getUser(),
        ]);
    }

}

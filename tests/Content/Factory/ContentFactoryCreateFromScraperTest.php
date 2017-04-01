<?php

namespace Tests;

use Joe\Content\Factory\ContentFactory;

class ContentFactoryCreateFromScraperTest extends AbstractFactoryTest
{
    protected function createContent(ContentFactory $factory)
    {
        $data = [
            'getId' => $this->data['id'],
            'getAuthor' => $this->data['author'],
            'getAddress' => $this->data['link'],
            'getTitle' => $this->data['title'],
            'getViewsCount' => $this->data['views_count'],
            'getAddingTime' => $this->data['time'],
            'getOkCount' => $this->data['ok_count'],
            'getCommentsCount' => $this->data['comments_count'],
            'getContent' => $this->data['content'],
            'getNotOkCount' => $this->data['not_ok_count'],
            'getTags' => $this->data['tags'],
            'getComments' => $this->data['comments'],
            'getLikers' => $this->data['likers'],
            'getAgeRestrictions' => $this->data['age_restrictions'],
            'getDescription' => $this->data['description']
        ];

        $scraper = $this->mockArtScraper($data);

        return $factory->createFromScraper($scraper);
    }

    protected function getClassOfContent()
    {
        return 'Joe\Content\Art';
    }

}

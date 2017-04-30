<?php

namespace Joe\Top;

use Joe\Content\Scraper\AbstractScraper;
use Joe\Type;
use simplehtmldom_1_5\simple_html_dom;

abstract class TopScraper extends AbstractScraper
{
    public function scrapItems($range, $itemsCount)
    {
        $type = $this->getQueryType();
        $address = 'http://joemonster.org/top.php?time=' . $range . '&type=' . $type . '&limit=' . $itemsCount;
        $html = $this->getPage($address);
        return $this->extractData($html);
    }

    /**
     * @param string $id
     * @return int
     */
    protected function getTypeById($id)
    {
        $ids = [
            'Top_artykulow' => Type::ARTICLE,
            'Top_obrazkow' => Type::GAL_IMAGE,
            'Top_filmow' => Type::CLOSET_MOVIE,
            'Top_gier' => Type::GAME,
            'Top_obrazkow_z_Szaffy' => Type::CLOSET_IMAGE,
            'Top_MP3_z_Szaffy' => Type::CLOSET_MUSIC,
            'Top_filmow_z_Szaffy' => Type::CLOSET_MOVIE,
            'Top_Linkow' => Type::LINK,
            'Top_wpisow_na_Blogach' => Type::BLOG
        ];

        return isset($ids[$id]) ? $ids[$id] : -1;
    }

    /**
     * @return string
     */
    abstract protected function getQueryType();

    protected function extractData(simple_html_dom $html)
    {
    }
}

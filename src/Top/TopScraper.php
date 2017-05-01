<?php

namespace Joe\Top;

use Joe\Content\Scraper\AbstractScraper;
use Joe\Type;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

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
        $map = [];
        array_map(
            function (simple_html_dom_node $node) use (&$map) {
                return array_map(
                    function (simple_html_dom_node $li) use ($node, &$map) {
                        $map[] = [
                            'counter' => trim($li->text()),
                            'title' => trim($li->find('a', 0)->text()),
                            'thumbnail' => ($img = $li->find('a>img', 0)) ? $img->src : '',
                            'type' => $this->getTypeById($node->id),
                            'url' => $li->find('a', 0)->href
                        ];
                    },
                    $node->next_sibling()->find('li,LI')
                );
            },
            $html->find('h2')
        );

        return $map;
    }
}

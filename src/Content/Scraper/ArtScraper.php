<?php

namespace Joe\Content\Scraper;

use Joe\Content\ArtFactory;
use Joe\User;

class ArtScraper extends ContentScraper
{
    public function getSite($id)
    {
        $address = $this::ADDRESS . '/art/' . $id;
        $html = $this->getPage($address);

        $art = $html->find('#main_article');
        if (isset($art[0])) {
            $art = $art[0];
        } else {
            throw new \Exception('Article path not found');
        }
        $title = $art->find('.title');
        $authorDate = $art->find('.art-author-date');
        $authorDate = isset($authorDate[0]) ? array_map('trim', explode('&middot;', $authorDate[0]->text())) : ['', ''];
        $date = explode(' ', $authorDate);
        $counts = isset($counts[0]) ? array_map('trim', explode('&middot;', $counts[0]->text())) : ['', '', ''];
        $content = $html->find('div#arcik');
        $notOkCount = $html->find('div#objectNotOkID');
        $tags = array_map(function($val){
            return $val->text();
        }, $html->find('.tag'));

        $artFactory = new ArtFactory;
        return $artFactory->create([
            'author' => new User($authorDate[0]),
            'title' => isset($title[0]) ? trim($title[0]->text()) : '',
            'link' => $address,
            'id' => $id,
            'main_views_count' => (int) $counts[0],
            'main_ok_count' => (int)$counts[1],
            'comments_count_on_page' => (int)$counts[2],


            'tags' => $tags,
            'full_description' => isset($content[0]) ? $content[0]->innertext() : '',
            'main_adding_time' =>
                isset($date[0])
                ? new \DateTime(
                    $date[2] . '-' . $this->monthNameToNumber($date[1]) . '-' . $date[0] . $date[3] . ':' . $date[4]
                )
                : null
            ,
            'main_not_ok_count' => isset($notOkCount[0]) ? (int)$notOkCount[0]->text() : 0
        ]);

    }

    private function monthNameToNumber($monthName)
    {
        switch ($monthName) {
            case 'stycznia':
                return '01';
            case 'lutego':
                return '02';
            case 'marca':
                return '03';
            case 'kwietnia':
                return '04';
            case 'maja':
                return '05';
            case 'czerwca':
                return '06';
            case 'lipca':
                return '07';
            case 'sierpnia':
                return '08';
            case 'września':
                return '09';
            case 'października':
                return '10';
            case 'listopada':
                return '11';
            case 'grudnia':
                return '12';
            default:
                return '01';
        }
    }
}

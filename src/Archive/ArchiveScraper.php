<?php

namespace Joe\Archive;

use Joe\Connection;
use Joe\Content\Scraper\AbstractScraper;
use Joe\Http\GetPageTrait;
use simplehtmldom_1_5\simple_html_dom_node;

class ArchiveScraper extends AbstractScraper
{
    use GetPageTrait;

    public function scrapMonth($year, $month)
    {
        return $this->scrapInterval($year, $month);
    }

    public function scrapYear($year)
    {
        return $this->scrapInterval($year, 0);
    }

    protected function scrapInterval($year, $month)
    {
        $html = $this->getPage('http://joemonster.org/archiwum.php?sa=show_month&year='.$year.'&month='.$month);
        $factory = new ArchiveEntryFactory();
        return array_map(
            function (simple_html_dom_node $row) use ($factory) {
                $children = $row->children();
                $link = $children[1]->find('a', 0);
                return $factory->create([
                    'comments_count' => trim($children[2]->text()),
                    'date' => trim($children[0]->text()),
                    'ok_count' => trim($children[4]->text()),
                    'views_count' => str_replace(' ', '', trim($children[3]->text())),
                    'name' => trim($link->text()),
                    'url' => Connection::ADDRESS .substr($link->href, 0, strrpos($link->href, '/'))
                ]);
            },
            $html->find('#archiwum tbody tr.lstd')
        );
    }
}
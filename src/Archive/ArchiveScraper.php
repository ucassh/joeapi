<?php

namespace Joe\Archieve;

use Joe\Content\Scraper\AbstractScraper;
use Joe\Http\GetPageTrait;

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
        $entries = $html->find('#archiwum tbody tr');
    }
}
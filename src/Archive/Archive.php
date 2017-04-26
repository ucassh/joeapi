<?php

namespace Joe\Archive;

use Joe\Http\Client;

class Archive
{
    /** @var  [] */
    private $data;
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function getMonth($year, $month)
    {
        if (!isset($this->data[$year][$month])) {
            $this->data[$year][$month] = (new ArchiveScraper(null, $this->client))->scrapMonth($year, $month);
        }

        return $this->data[$year][$month];
    }

    public function getYear($year)
    {
        if (!isset($this->data[$year]) && (count($this->data[$year]) < 12 || $year != date('Y'))) {
            $this->data[$year] = (new ArchiveScraper(null, $this->client))->scrapYear($year);
        }

        $this->data[$year];
    }
}
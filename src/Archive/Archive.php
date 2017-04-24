<?php

namespace Joe\Archieve;

class Archive
{
    /** @var  [] */
    private $data;

    public function getMonth($year, $month)
    {
        if (!isset($this->data[$year][$month])) {
            // scrap month
        }

        return $this->data[$year][$month];
    }

    public function getYear($year)
    {
        if (!isset($this->data[$year]) && (count($this->data[$year]) < 12 || $year != date('Y'))) {
            // scrap year
        }

        $this->data[$year];
    }
}
<?php

namespace Joe\Top;

class MostViewedScraper extends TopScraper
{
    protected function getQueryType()
    {
        return 'readers';
    }
}
<?php

namespace Joe\Top;

class MostPopularPollsScraper extends TopScraper
{

    protected function getQueryType()
    {
        return 'poll';
    }
}

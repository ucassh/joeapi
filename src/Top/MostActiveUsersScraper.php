<?php

namespace Joe\Top;

class MostActiveUsersScraper extends TopScraper
{
    protected function getQueryType()
    {
        return 'subm';
    }
}
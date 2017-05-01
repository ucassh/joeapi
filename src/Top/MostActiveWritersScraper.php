<?php

namespace Joe\Top;

class MostActiveWritersScraper extends TopScraper
{
    protected function getQueryType()
    {
        return 'writers';
    }
}
<?php

namespace Joe\Top;

class MostCommentedScraper extends TopScraper
{
    protected function getQueryType()
    {
        return 'comment';
    }

}
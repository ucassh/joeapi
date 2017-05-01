<?php

namespace Joe\Top;

class MostLikedScraper extends TopScraper
{
    protected function getQueryType()
    {
        return 'favourites';
    }

}
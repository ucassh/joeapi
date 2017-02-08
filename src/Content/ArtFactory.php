<?php

namespace Joe\Content;

class ArtFactory
{
    /**
     * @param array $params
     * @return Art
     */
    public static function createFromListing(array $params = [])
    {
        $art = new Art($params['id']);
        return $art->setAddingTimeFromSnippet($params['time'])
            ->setAddingDateFromSnippet($params['date'])
            ->setAuthor($params['author'])
            ->setLink($params['link'])
            ->setOkCountFromSnippet($params['ok_count'])
            ->setCommentsCountFromSnippet($params['comments_count'])
            ->setSnippetMsg($params['snippet_msg'])
            ->setThumbnail($params['thumbnail'])
            ->setTitle($params['title'])
            ->setViewsFromSnippet($params['views_count']);
    }
}

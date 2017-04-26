<?php

namespace Joe\Archive;

class ArchiveEntryFactory
{
    /**
     * @param array $params
     * @return ArchiveEntryEntity
     */
    public function create(array $params = [])
    {
        return (new ArchiveEntryEntity())
            ->setCommentsCount($params['comments_count'] ?: 0)
            ->setDate(new \DateTime($params['date'] ?: null))
            ->setName($params['name'] ?: '')
            ->setOkCount($params['ok_count'] ?: 0)
            ->setUrl($params['url'] ?: '')
            ->setViewsCount($params['views_count'] ?: 0);
    }
}

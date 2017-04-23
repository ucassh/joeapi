<?php

namespace Joe\Club\Forum;

use Joe\User;

class ClubForumPostFactory
{
    /**
     * @param array $params
     * @return ClubForumPostEntity
     */
    public function create(array $params = [])
    {
        return (new ClubForumPostEntity())
            ->setAuthor(new User($params['username'] ?: null))
            ->setCreated(new \DateTime($params['created'] ?: null))
            ->setProperties($params['properties'] ?: [])
            ->setMessage($params['message'] ?: '')
            ->setEdits($params['edits'] ?: []);
    }
}

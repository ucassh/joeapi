<?php

namespace Joe\Club\Forum;

use Joe\User;

class ClubForumThreadFactory
{
    /**
     * @param array $params
     * @return ClubForumThreadEntity
     */
    public function create(array $params = [])
    {
        return (new ClubForumThreadEntity())
            ->setAuthor(new User($params['username'] ?:null))
            ->setCreated(new \DateTime($params['created'] ?:null))
            ->setTitle($params['title'] ?:'')
            ->setLastCommented(new \DateTime($params['last_commented'] ?:null))
            ->setLatestCommentedBy($params['last_commented_by'] ?:null)
            ->setSnippet($params['snippet'] ?:'');
    }
}

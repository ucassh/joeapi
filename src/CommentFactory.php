<?php

namespace Joe;

class CommentFactory
{
    /**
     * @param array $fields
     * @return Comment
     */
    public static function create(array $fields)
    {
        $comment = new Comment;
        return $comment->setContentId($fields['id'])
            ->setDate(new \DateTime($fields['data']))
            ->setElementId($fields['elementid'])
            ->setFavcount($fields['favcount'])
            ->setNotOkCount($fields['notOkCount'])
            ->setLink($fields['link'])
            ->setMessage($fields['html'])
            ->setParentId($fields['parent_id'])
            ->setToplevel($fields['toplevel'])
            ->setType($fields['type'])
            ->setUnixTimestamp($fields['utimestamp'])
            ->setUser($fields['user']);
    }
}

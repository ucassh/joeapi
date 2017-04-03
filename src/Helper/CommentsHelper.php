<?php

namespace Joe\Helper;

use Joe\CommentFactory;
use Joe\Log;
use Joe\User;
use Sunra\PhpSimple\HtmlDomParser;

class CommentsHelper
{
    /**
     * @param $content
     * @param $comment
     * @return \ArrayObject
     * @throws \Exception
     */
    public static function extractComments($content)
    {
        $lines = preg_split("/\n/", $content);
        $commentsLine = '';
        foreach ($lines as $line) {
            $line = trim($line);
            if ('comment_js' === substr($line, 0, 10)) {
                $commentsLine = substr($line, 11);
                $commentsLine = trim($commentsLine, " =;");
                break;
            }
        }
        if ($commentsLine === '') {
            throw new \Exception('No comments found. Probably You are not logged in.');
        }

        $comments = json_decode($commentsLine, true);
        $collection = new \ArrayObject;
        foreach ($comments['comments'] as $commentId => &$comment) {
            $commBody = HtmlDomParser::str_get_html($comment['maincomment']['html']);

            $notOkNode = $commBody->find('.commok2 a');
            if (!isset($notOkNode[0])) {
                throw new \Exception("Node not found - new structure!" . $comment['maincomment']['html']);
            }
            $notOkCount = isset($notOkNode[0]) ? (int)trim($notOkNode[0]->text()) : 0;
            $message = trim($commBody->find('.commentDesc span')[0]->text());
            $links = $commBody->find('.commentBoxHeader a');

            $comment['maincomment']['link'] = $links[count($links) - 1]->href;
            $comment['maincomment']['user'] = new User($comment['maincomment']['uname']);
            $comment['maincomment']['notOkCount'] = $notOkCount;
            $comment['maincomment']['html'] = $message;

            $collection->append(CommentFactory::create($comment['maincomment']));
        }

        return $collection;
    }
}
<?php

namespace Joe\Helper;

use Joe\CommentFactory;
use Joe\User;
use Sunra\PhpSimple\HtmlDomParser;

class CommentsHelper
{
    protected $usersMap;
    /**
     * @param $content
     * @return \ArrayObject
     * @throws \Exception
     */
    public function extractComments($content)
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
            throw new \Exception('No comments found');
        }

        $comments = json_decode($commentsLine, true);
        $collection = new \ArrayObject;
        foreach ($comments['comments'] as $commentId => &$comment) {
            $commBody = HtmlDomParser::str_get_html($comment['maincomment']['html']);

            $notOkNode = $commBody->find('.commok2 a');
            $notOkCount = isset($notOkNode[0]) ? (int)trim($notOkNode[0]->text()) : 0;
            $message = trim($commBody->find('.commentDesc span')[0]->text());
            $links = $commBody->find('.commentBoxHeader a');
            $nickName = $comment['maincomment']['uname'];
            if (!isset($this->usersMap[$nickName])) {
                $this->usersMap[$nickName] = new User($nickName);
            }
            if (empty($links) || empty($message)) {
                throw new \Exception("Node not found - new structure!" . $comment['maincomment']['html']);
            }

            $comment['maincomment']['link'] = $links[count($links) - 1]->href;
            $comment['maincomment']['user'] = $this->usersMap[$nickName];
            $comment['maincomment']['notOkCount'] = $notOkCount;
            $comment['maincomment']['html'] = $message;

            $collection->append(CommentFactory::create($comment['maincomment']));
        }

        return $collection;
    }
}

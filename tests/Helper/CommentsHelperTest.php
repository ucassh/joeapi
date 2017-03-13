<?php

use Joe\Helper\CommentsHelper;

class CommentsHelperTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Node not found - new structure!
     */
    public function testExtractComments()
    {
        $comments = file_get_contents('tests/files/comment-line-exception.txt');
        CommentsHelper::extractComments($comments);
    }
}

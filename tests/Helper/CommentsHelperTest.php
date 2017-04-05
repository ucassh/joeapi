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
        (new CommentsHelper)->extractComments($comments);
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage No comments found
     */
    public function testGetUserCommentsButNoCommentsFound()
    {
        (new CommentsHelper)->extractComments('');
    }

    public function testGetUserComments()
    {
        $comments = file_get_contents('tests/files/comments-payed-account.html');
        $commentList = (new CommentsHelper)->extractComments($comments);

        $this->assertSame(ArrayObject::class, get_class($commentList));

        /** @var \Joe\Comment[] $comment */
        $comment = $commentList->getArrayCopy();

        $this->assertSame("Comment No. 1", $comment[0]->getMessage(), "Message read incorrect");
        $this->assertSame("2016-11-06 22:43:50", $comment[0]->getDate()->format("Y-m-d H:i:s"), "Date read incorrect");
        $this->assertSame(6, $comment[0]->getFavcount(), "Favcount read incorrect");
        $this->assertSame(11, $comment[0]->getNotOkCount(), "NotOkCount read incorrect");
        $this->assertSame(81823304797, $comment[0]->getContentId(), "ContenId read incorrect");
        $this->assertSame(81823304797, $comment[0]->getParentId(), "ParentId read incorrect");
        $this->assertSame('nasty_cutlet', $comment[0]->getUser()->nickName(), "User read incorrect");
        $this->assertSame(5432, $comment[0]->getElementId(), "ElementIt read incorrect");
        $this->assertSame(1478468630, $comment[0]->getUnixTimestamp(), "UnieTimestamp read incorrect");
        $this->assertSame("vid", $comment[0]->getType(), "Type read incorrect");
        $this->assertSame(1, $comment[0]->getToplevel(), "TopLevel read incorrect");
        $this->assertSame('/filmy/5432#cm81823304797', $comment[0]->getLink(), "Link is incorrect");

        $this->assertSame("Comment No. 2", $comment[1]->getMessage(), "Message read incorrect");
        $this->assertSame("2016-11-06 14:23:47", $comment[1]->getDate()->format("Y-m-d H:i:s"), "Date read incorrect");
        $this->assertSame(0, $comment[1]->getFavcount(), "Favcount read incorrect");
        $this->assertSame(7, $comment[1]->getNotOkCount(), "NotOkCount read incorrect");
        $this->assertSame(2222, $comment[1]->getContentId(), "ContenId read incorrect");
        $this->assertSame(2222, $comment[1]->getParentId(), "ParentId read incorrect");
        $this->assertSame('nasty_cutlet', $comment[1]->getUser()->nickName(), "User read incorrect");
        $this->assertSame(4444, $comment[1]->getElementId(), "ElementIt read incorrect");
        $this->assertSame(1478438627, $comment[1]->getUnixTimestamp(), "UnieTimestamp read incorrect");
        $this->assertSame("art", $comment[1]->getType(), "Type read incorrect");
        $this->assertSame(1, $comment[1]->getToplevel(), "TopLevel read incorrect");
        $this->assertSame('/art/4444#cm2222', $comment[1]->getLink(), "Link is incorrect");
    }
}

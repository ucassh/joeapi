<?php
namespace Tests;

use Joe\Comment;
use Joe\Fan;
use Joe\User;

class UserTest extends TestsAbstract
{
    public function testGetUserFans()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/fans.html'));
        $client = $this->mockClient($response);

        $user = new User('taksobietestuje');
        $user->setClient($client);

        $fans = $user->fans();
        $this->assertEquals(1, $fans->count(), 'Quantity of fans doesn\'t match');

        /** @var Fan $fan */
        foreach ($fans as $fan) {
            $this->assertSame($user, $fan->whom(), "Fan instance should be a fan of User instance");
        }

        $this->assertEquals("onlyonefan", $fan->nickName(), "Fan nickname mismatch");

        $fanSince = $fan->since()->format("Y-m-d H:i:s");
        $this->assertEquals("2015-06-11 20:58:15", $fanSince, 'Incorrect \'became a fan\' time ');
    }

    public function testGetUserComments()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/comments-payed-account.html'));
        $client = $this->mockClient($response);

        $user = new User('nasty_cutlet');
        $user->setClient($client);
        $comments = $user->comments();

        $this->assertEquals(2, $comments->count());

        /** @var Comment[] $comment */
        $comment = $comments->getArrayCopy();

        $this->assertSame("Comment No. 1", $comment[0]->getMessage(), "Message read incorrect");
        $this->assertSame("2016-11-06 22:43:50", $comment[0]->getDate()->format("Y-m-d H:i:s"), "Date read incorrect");
        $this->assertSame(6, $comment[0]->getFavcount(), "Favcount read incorrect");
        $this->assertSame(11, $comment[0]->getNotOkCount(), "NotOkCount read incorrect");
        $this->assertSame(81823304797, $comment[0]->getContentId(), "ContenId read incorrect");
        $this->assertSame(81823304797, $comment[0]->getParentId(), "ParentId read incorrect");
        $this->assertSame($user->nickName(), $comment[0]->getUser()->nickName(), "User read incorrect");
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
        $this->assertSame($user->nickName(), $comment[1]->getUser()->nickName(), "User read incorrect");
        $this->assertSame(4444, $comment[1]->getElementId(), "ElementIt read incorrect");
        $this->assertSame(1478438627, $comment[1]->getUnixTimestamp(), "UnieTimestamp read incorrect");
        $this->assertSame("art", $comment[1]->getType(), "Type read incorrect");
        $this->assertSame(1, $comment[1]->getToplevel(), "TopLevel read incorrect");
        $this->assertSame('/art/4444#cm2222', $comment[1]->getLink(), "Link is incorrect");
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage No comments found. Probably You are not logged in.
     */
    public function testGetUserCommentsButNoCommentsFound()
    {
        $response = $this->mockResponse('');
        $client = $this->mockClient($response);

        $user = new User('taksobietestuje');
        $user->setClient($client);
        $user->comments();
    }
}

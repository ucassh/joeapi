<?php
namespace Tests;

use Joe\Fan;
use Joe\User;
use Mockery as m;

/**
 * @preserveGlobalState disabled
 */
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
        $response = $this->mockResponse('');
        $client = $this->mockClient($response);

        m::mock('overload:\Joe\Helper\CommentsHelper')
            ->shouldReceive('extractComments')
            ->andReturn(new \ArrayObject);

        $user = new User('nasty_cutlet');
        $user->setClient($client);
        $comments = $user->comments();

        $this->assertSame(\ArrayObject::class, get_class($comments));
    }


    /**
     * @runInSeparateProcess
     */
    public function testAbout()
    {
        m::mock('overload:Joe\User\About');

        $user = new User('taksobietestuje');
        $about = $user->about();

        $this::assertSame(User\About::class, get_class($about));
        $about2 = $user->about();

        $this::assertSame($about, $about2);
    }

    /**
     * @runInSeparateProcess
     */
    public function testSendedContent()
    {
        m::mock('overload:Joe\User\SendedContent');

        $user = new User('taksobietestuje');
        $sended = $user->sended();

        $this::assertSame(User\SendedContent::class, get_class($sended));
        $sended2 = $user->sended();

        $this::assertSame($sended, $sended2);
    }

    public function testPlaceholders()
    {
        $user = new User('taksobietestuje');
        $user->wardrobe();
        $user->fanOf();
        $user->clubs();
        $user->blog();
        $user->subscriptions();
    }


}

<?php
namespace Tests;

use Joe\Content\Content;
use Joe\Content\Factory\ContentFactory;
use Joe\User;

class ContentFactoryTest extends TestsAbstract
{
    protected $data;

    protected function setUp()
    {
        $user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->data = [];
        $this->data['id'] = 1;
        $this->data['time'] = new \DateTime('2000-01-01 00:00:00');
        $this->data['author'] = $user;
        $this->data['link'] = 'http://joemonster.org';
        $this->data['comments_count'] = 123;
        $this->data['content'] = 'the quick brown fox jumps over the lazy dog';
        $this->data['title'] = 'Fox & Dog';
        $this->data['ok_count'] = 321;
        $this->data['not_ok_count'] = 1;
        $this->data['views_count'] = 999;
        $this->data['age_restrictions'] = false;
        $this->data['comments'] = new \ArrayObject;
        $this->data['likers'] = new \ArrayObject;
        $this->data['tags'] = ['tag1', 'tag2', 'tag3', 'tag4'];
        $this->data['description'] = 'tldr';
    }

    public function testCreateObjectByContentFactory()
    {
        $class = 'Joe\Content\Art';
        $factory = $this->getMockForAbstractClass(ContentFactory::class);
        $factory
            ->expects($this::any())
            ->method('getClass')
            ->willReturn($class);

        $content = $factory->create($this->data);
        $this::assertSame($class, get_class($content));

        return $content;
    }


}

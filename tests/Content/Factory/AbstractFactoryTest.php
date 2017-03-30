<?php
namespace Tests;

use Joe\Content\Content;
use Joe\Content\Factory\ContentFactory;
use Joe\User;

abstract class AbstractFactoryTest extends TestsAbstract
{
    protected $data;
    protected $content;
    protected $class;

    abstract protected function createContent(ContentFactory $factory);

    /**
     * @return string
     */
    abstract protected function getClassOfContent();

    protected function prepare()
    {
        $this->class = $this->getClassOfContent();

        $this->prepareData();

        $factory = $this->prepareFactory();

        $this->content = $this->createContent($factory);
    }


    public function testCreateObjectByContentFactory()
    {
        $this->prepare();

        $this::assertSame($this->class, get_class($this->content));
    }

    public function testContentValues()
    {
        $this->prepare();

        /** @var Content $content */
        $content = $this->content;
        $this::assertSame($this->data['id'], $content->getId());
        $this::assertSame($this->data['time'], $content->getAddingTime());
        $this::assertSame($this->data['author'], $content->getAuthor());
        $this::assertSame($this->data['link'], $content->getLink());
        $this::assertSame($this->data['comments_count'], $content->getCommentsCount());
        $this::assertSame($this->data['content'], $content->getContent());
        $this::assertSame($this->data['title'], $content->getTitle());
        $this::assertSame($this->data['ok_count'], $content->getOkCount());
        $this::assertSame($this->data['not_ok_count'], $content->getNotOkCount());
        $this::assertSame($this->data['views_count'], $content->getViewsCount());
        $this::assertSame($this->data['age_restrictions'], $content->getAgeRestrictions());
        $this::assertSame($this->data['comments'], $content->getComments());
        $this::assertSame($this->data['likers'], $content->getLikers());
        $this::assertSame($this->data['tags'], $content->getTags());
        $this::assertSame($this->data['description'], $content->getDescription());
    }

    protected function prepareData()
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

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function prepareFactory()
    {
        $factory = $this->getMockForAbstractClass(ContentFactory::class);
        $factory
            ->expects($this::any())
            ->method('getClass')
            ->willReturn($this->class);
        return $factory;
    }
}

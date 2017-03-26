<?php

namespace Tests;

use Joe\Content\Content;
use Joe\User;

class ContentTest extends TestsAbstract
{
    public function testCreate()
    {
        $id = 'id';
        $content = $this->getMockForAbstractClass(Content::class, [$id]);
        $this::assertSame($id, $content->getId());
        return $content;
    }

    /**
     * @depends clone testCreate
     */
    public function testContentGettersAndSetters(Content $content)
    {
        $content->setAddingTime($addingTime = new \DateTime('2000-00-00 00:00:00'));
        $this::assertSame($addingTime, $content->getAddingTime());

        $content->setAgeRestrictions($ageRestrictions = true);
        $this::assertSame($ageRestrictions, $content->getAgeRestrictions());

        $content->setAuthor($user = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock());
        $this::assertSame($user, $content->getAuthor());

        $content->setComments($comments = new \ArrayObject([1,2,3]));
        $this::assertSame($comments, $content->getComments());

        $content->setCommentsCount($commentsCount = 5);
        $this::assertSame($commentsCount, $content->getCommentsCount());

        $content->setDescription($description = 'long long long long long long long long text');
        $this::assertSame($description, $content->getDescription());

        $content->setLikers($likers = new \ArrayObject([1,2,3,4,5]));
        $this::assertSame($likers, $content->getLikers());

        $content->setNotOkCount($notOkCount = 0);
        $this::assertSame($notOkCount, $content->getNotOkCount());

        $content->setOkCount($okCount = 1000);
        $this::assertSame($okCount, $content->getOkCount());

        $content->setLink($link = 'http://joemonster.org/');
        $this::assertSame($link, $content->getLink());

        $content->setTags($tags = ['tag1', 'tag2', 'tag3']);
        $this::assertSame($tags, $content->getTags());

        $content->setTitle($title = 'Example title');
        $this::assertSame($title, $content->getTitle());

        $content->setContent($textContent = '<html>text</html>');
        $this::assertSame($textContent, $content->getContent());

        $content->setViewsCount($viewsCount = 123);
        $this::assertSame($viewsCount, $content->getViewsCount());
    }

    /**
     * @depends clone testCreate
     */
    public function testContentNullGettersAndSetters(Content $content)
    {
        $content->setAddingTime($addingTime = null);
        $this::assertSame($addingTime, $content->getAddingTime());

        $content->setAgeRestrictions($ageRestrictions = null);
        $this::assertSame($ageRestrictions, $content->getAgeRestrictions());

        $content->setCommentsCount($commentsCount = null);
        $this::assertSame($commentsCount, $content->getCommentsCount());

        $content->setDescription($description = null);
        $this::assertSame($description, $content->getDescription());

        $content->setNotOkCount($notOkCount = null);
        $this::assertSame($notOkCount, $content->getNotOkCount());

        $content->setOkCount($okCount = null);
        $this::assertSame($okCount, $content->getOkCount());

        $content->setLink($link = null);
        $this::assertSame($link, $content->getLink());

        $content->setTags($tags = null);
        $this::assertSame($tags, $content->getTags());

        $content->setTitle($title = null);
        $this::assertSame($title, $content->getTitle());

        $content->setContent($textContent = null);
        $this::assertSame($textContent, $content->getContent());

        $content->setViewsCount($viewsCount = null);
        $this::assertSame($viewsCount, $content->getViewsCount());
    }

}

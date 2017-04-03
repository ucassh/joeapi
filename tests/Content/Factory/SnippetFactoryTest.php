<?php

namespace Tests;

use Joe\Content\ArtSnippet;
use Joe\Content\Factory\ContentFactory;
use Joe\Content\Factory\SnippetFactory;

class SnippetFactoryTest extends AbstractFactoryTest
{

    protected function prepareData()
    {
        parent::prepareData();
        $this->data['thumbnail'] = 'some small thumbnail';
    }

    protected function prepareFactory()
    {
        return new SnippetFactory($this->getClassOfContent());
    }

    protected function createContent(ContentFactory $factory)
    {
        return $factory->create($this->data);
    }

    public function testContentValues()
    {
        $this->prepare();

        /** @var ArtSnippet $content */
        $content = $this->content;
        $this::assertSame($this->data['thumbnail'], $content->getThumbnail());

    }

    protected function getClassOfContent()
    {
        return 'Joe\Content\ArtSnippet';
    }
}

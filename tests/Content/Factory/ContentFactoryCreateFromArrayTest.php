<?php

namespace Tests;

use Joe\Content\Factory\ContentFactory;

class ContentFactoryCreateFromArrayTest extends AbstractFactoryTest
{
    protected function createContent(ContentFactory $factory)
    {
        return $factory->create($this->data);
    }

    /**
     * @return string
     */
    protected function getClassOfContent()
    {
        return 'Joe\Content\Art';
    }
}

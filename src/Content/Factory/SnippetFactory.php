<?php

namespace Joe\Content\Factory;

class SnippetFactory extends ContentFactory
{
    public function __construct($class = null)
    {
        $this->clazz = $class;
    }

    public function create(array $params = [])
    {
        return parent::create($params)
            ->setThumbnail(isset($params['thumbnail']) ? $params['thumbnail'] : null);
    }
}

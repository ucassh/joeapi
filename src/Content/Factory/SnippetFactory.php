<?php

namespace Joe\Content\Factory;

class SnippetFactory extends ContentFactory
{
    protected $clazz;

    public function __construct($class = null)
    {
        $this->clazz = $class;
    }

    protected function getClass()
    {
        return 'Joe\Content\\' . $this->clazz;
    }

    public function create(array $params = [])
    {
        return parent::create($params)
            ->setThumbnail(isset($params['thumbnail']) ? $params['thumbnail'] : null);
    }
}

<?php

namespace Joe\Content\Scraper;

use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

trait PrepareableTrait
{

    /** @var simple_html_dom_node $content */
    protected $content;

    /** @var simple_html_dom_node $html */
    protected $html;

    protected function prepare()
    {
        $this->html = $this->getPage($this->getAddress());

        $content = $this->contentHtml($this->html);

        if (empty($content)) {
            throw new \Exception('Content not found');
        }

        $this->content = $content;
    }

    abstract public function getAddress();

    abstract protected function contentHtml(simple_html_dom $fullHtml = null);

}

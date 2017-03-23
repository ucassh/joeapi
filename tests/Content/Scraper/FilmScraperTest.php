<?php

namespace Tests;

use Joe\Content\Scraper\FilmScraper;

class FilmScraperTest extends TestsAbstract
{

    public function testScrapingFilmWithContent()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/film.html'));
        $client = $this->mockClient($response);
        $id = 81989;
        
        $scraper = new FilmScraper($id, $client);
        $this->assertEquals('Hato88', $scraper->getAuthor()->nickName());
        $this->assertEquals('Kelnerka wynosi niechcianego klienta z restauracji', $scraper->getTitle());
        $this->assertEquals('http://joemonster.org/filmy/81989', $scraper->getAddress());
        $this->assertEquals($id, $scraper->getId());
        $this->assertEquals(0, $scraper->getViewsCount());
        $this->assertEquals(304, $scraper->getOkCount());
        $this->assertEquals(59, $scraper->getCommentsCount());
        $this->assertEquals(['legwan', 'kelnerka', 'gość', 'klient', 'australia'], $scraper->getTags());
        ///$this->assertEquals(' - a lot of data - ', $scraper->getContent());
        $this->assertEquals('2017-02-21 10:32:41', $scraper->getAddingTime()->format('Y-m-d H:i:s'));
        $this->assertEquals(3, $scraper->getNotOkCount());
        $this->assertEquals(32, $scraper->getComments()->count());
        //$this->assertEquals(304, $scraper->getLikers()->count()); - tested in another test
        $this->assertEquals(false, $scraper->getAgeRestrictions());
        $this->assertEquals('Francuska kelnerka wykazała się niemałą odwagą, kiedy nieproszony "pies" pojawił się w knajpie. Miejsce akcji - Australia oczywiście.', $scraper->getDescription());
        $this->assertEquals('Amatorskie', $scraper->getCategory());
    }

    public function testLikersTest()
    {
        $response = $this->mockResponse('<div id="main"></div>');
        $responseLikers = $this->mockResponse(file_get_contents('tests/files/film-likers.html'));
        $client = $this->mockClient([$response, $responseLikers]);
        $id = 81989;

        $scraper = new FilmScraper($id, $client);
        $this->assertEquals(306, $scraper->getLikers()->count());
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage No document found
     */
    public function testNoResponse()
    {
        $response = $this->mockResponse('');
        $client = $this->mockClient($response);

        new FilmScraper(81989, $client);
    }


}

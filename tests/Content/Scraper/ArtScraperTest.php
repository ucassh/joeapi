<?php

namespace Tests;

use Joe\Content\Scraper\ArtScraper;


class ArtScraperTest extends TestsAbstract
{

    public function testScrapingArtWithContent()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/art.html'));
        $client = $this->mockClient($response);
        $artId = 38793;

        $scraper = new ArtScraper($artId, $client);
        $this::assertEquals('Brzeziu', $scraper->getAuthor()->nickName());
        $this::assertEquals('Piekielne wspomnienia o najgorszych współlokatorach', $scraper->getTitle());
        $this::assertEquals('http://joemonster.org/art/38793', $scraper->getAddress());
        $this::assertEquals($artId, $scraper->getId());
        $this::assertEquals(103, $scraper->getViewsCount());
        $this::assertEquals(266, $scraper->getOkCount());
        $this::assertEquals(52, $scraper->getCommentsCount());
        $this::assertEquals(['lokator', 'królik', 'seks', 'higiena', 'kradzież'], $scraper->getTags());
        ///$this::assertEquals(' - a lot of data - ', $scraper->getContent());
        $this::assertEquals('2017-02-14 06:30:00', $scraper->getAddingTime()->format('Y-m-d H:i:s'));
        $this::assertEquals(25, $scraper->getNotOkCount());
        $this::assertEquals(29, $scraper->getComments()->count());
        //$this::assertEquals(304, $scraper->getLikers()->count()); - tested in another test
        $this::assertEquals(false, $scraper->getAgeRestrictions());
        $this::assertEquals('W życiu większości studentów przychodzi czas przeprowadzki do  akademika lub mieszkania dzielonego z innymi ludźmi. Nie zawsze wygląda  to jak w "Przyjaciołach" czy innym amerykańskim serialu...', $scraper->getDescription());
    }

    public function testArtLikersTest()
    {
        $response = $this->mockResponse('<div id="main_article"></div>');
        $responseLikers = $this->mockResponse(file_get_contents('tests/files/art-likers.html'));
        $client = $this->mockClient([$response, $responseLikers]);

        $scraper = new ArtScraper(38793, $client);
        $this::assertEquals(266, $scraper->getLikers()->count());
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage No document found
     */
    public function testNoResponse()
    {
        $response = $this->mockResponse('');
        $client = $this->mockClient($response);

        new ArtScraper(38793, $client);
    }

    public function testPreperingDataProblems()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/art-author-date-conditional.html'));
        $client = $this->mockClient($response);

        $scraper = new ArtScraper(38793, $client);
        $this::assertNull($scraper->getAddingTime());
    }


}

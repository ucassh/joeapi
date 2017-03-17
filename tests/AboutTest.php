<?php

namespace Tests;

use Joe\User\About;

class AboutTest extends TestsAbstract
{
    /** @var About */
    private $about;

    protected function setUp()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/taksobietestuje.about.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $this->about = new About($user);
    }

    protected function tearDown()
    {
        $this->about = null;
    }

    public function testHelloMessage()
    {
        $hello = $this->about->getHelloMessage();
        $this::assertSame('Od 22 stycznia 2017   Nic ciekawego', $hello);
    }

    public function testBasicInfo()
    {
        $basicInfo = $this->about->getBasicInfo();
        $this::assertArrayHasKey('Status uczelniany', $basicInfo);
        $this::assertArrayHasKey('Stan', $basicInfo);
        $this::assertArrayHasKey('Miasto', $basicInfo);
        $this::assertArrayHasKey('Zajęcie', $basicInfo);
        $this::assertArrayHasKey('Zainteresowania ekstremalne', $basicInfo);
        $this::assertArrayHasKey('WWW', $basicInfo);
        $this::assertArrayHasKey('Status konta', $basicInfo);
        $this::assertArrayHasKey('GG', $basicInfo);
    }

    public function testCategorizedInfo()
    {
        $info = $this->about->getCategorisedInfo();
        $this::assertArrayHasKey('WAŻNE  INFORMACJE O MNIE', $info);
        $important = $info['WAŻNE  INFORMACJE O MNIE'];
        $this::assertArrayHasKey('Mogę załatwić', $important);
        $this::assertArrayHasKey('Jak długiego mam?', $important);
        $this::assertArrayHasKey('W przyszłości chcę zostać', $important);
        $this::assertArrayHasKey('Ważne osoby, które znam', $important);
        $this::assertArrayHasKey('Numer mojej karty kredytowej', $important);
        $this::assertArrayHasKey('Pin do mojej karty', $important);
        $this::assertArrayHasKey('Jak wiele jestem w stanie', $important);
        $this::assertArrayHasKey('Jak to lubię', $important);
        $this::assertArrayHasKey('Kiedy', $important);
        $this::assertArrayHasKey('Która godzina', $important);
        $this::assertArrayHasKey('Miseczka', $important);
        $this::assertArrayHasKey('Na pączka', $important);
        $this::assertArrayHasKey('Strony, które odwiedzam', $important);

        $this::assertArrayHasKey('CO LUBIĘ', $info);
        $like = $info['CO LUBIĘ'];
        $this::assertArrayHasKey('Film', $like);
        $this::assertArrayHasKey('Książka', $like);
        $this::assertArrayHasKey('Piosenka', $like);
        $this::assertArrayHasKey('Komedia', $like);
        $this::assertArrayHasKey('Dramat', $like);
        $this::assertArrayHasKey('Kabaret', $like);
        $this::assertArrayHasKey('Gra', $like);
        $this::assertArrayHasKey('Pozycja', $like);
        $this::assertArrayHasKey('Jedzenie', $like);
        $this::assertArrayHasKey('Seks', $like);
        $this::assertArrayHasKey('Władza', $like);
        $this::assertArrayHasKey('Alkohol', $like);

        $this::assertArrayHasKey('Aktywność bojownicza', $info);
        $acitivity = $info['Aktywność bojownicza'];
        $this::assertArrayHasKey('Profil oglądany', $acitivity);

    }

    public function testLocalization()
    {
        $localization = $this->about->getLocalization();
        $this::assertCount(2, $localization);
    }

}

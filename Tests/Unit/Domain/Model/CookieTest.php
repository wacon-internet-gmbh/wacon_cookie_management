<?php
namespace Waconcookiemanagement\WaconCookieManagement\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class CookieTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getBezeichnungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBezeichnung()
        );
    }

    /**
     * @test
     */
    public function setBezeichnungForStringSetsBezeichnung()
    {
        $this->subject->setBezeichnung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'bezeichnung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKategorieReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getKategorie()
        );
    }

    /**
     * @test
     */
    public function setKategorieForStringSetsKategorie()
    {
        $this->subject->setKategorie('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'kategorie',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAnbieterReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAnbieter()
        );
    }

    /**
     * @test
     */
    public function setAnbieterForStringSetsAnbieter()
    {
        $this->subject->setAnbieter('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'anbieter',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZweckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZweck()
        );
    }

    /**
     * @test
     */
    public function setZweckForStringSetsZweck()
    {
        $this->subject->setZweck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zweck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCookienameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCookiename()
        );
    }

    /**
     * @test
     */
    public function setCookienameForStringSetsCookiename()
    {
        $this->subject->setCookiename('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'cookiename',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLaufzeitReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLaufzeit()
        );
    }

    /**
     * @test
     */
    public function setLaufzeitForStringSetsLaufzeit()
    {
        $this->subject->setLaufzeit('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'laufzeit',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDatenschutzlinkReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDatenschutzlink()
        );
    }

    /**
     * @test
     */
    public function setDatenschutzlinkForStringSetsDatenschutzlink()
    {
        $this->subject->setDatenschutzlink('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'datenschutzlink',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getHostReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getHost()
        );
    }

    /**
     * @test
     */
    public function setHostForStringSetsHost()
    {
        $this->subject->setHost('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'host',
            $this->subject
        );
    }
}

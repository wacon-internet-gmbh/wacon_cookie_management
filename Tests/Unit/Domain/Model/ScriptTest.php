<?php

namespace Waconcookiemanagement\WaconCookieManagement\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class ScriptTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Script
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Script();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getScriptReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getScript()
        );
    }

    /**
     * @test
     */
    public function setScriptForStringSetsScript()
    {
        $this->subject->setScript('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'script',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCookieReturnsInitialValueForCookie()
    {
        self::assertEquals(
            null,
            $this->subject->getCookie()
        );
    }

    /**
     * @test
     */
    public function setCookieForCookieSetsCookie()
    {
        $cookieFixture = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie();
        $this->subject->setCookie($cookieFixture);

        self::assertAttributeEquals(
            $cookieFixture,
            'cookie',
            $this->subject
        );
    }
}

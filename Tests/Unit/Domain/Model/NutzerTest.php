<?php

namespace Waconcookiemanagement\WaconCookieManagement\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class NutzerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCookieidReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCookieid()
        );
    }

    /**
     * @test
     */
    public function setCookieidForStringSetsCookieid()
    {
        $this->subject->setCookieid('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'cookieid',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFreigabeReturnsInitialValueForCookie()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFreigabe()
        );
    }

    /**
     * @test
     */
    public function setFreigabeForObjectStorageContainingCookieSetsFreigabe()
    {
        $freigabe = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie();
        $objectStorageHoldingExactlyOneFreigabe = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFreigabe->attach($freigabe);
        $this->subject->setFreigabe($objectStorageHoldingExactlyOneFreigabe);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFreigabe,
            'freigabe',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFreigabeToObjectStorageHoldingFreigabe()
    {
        $freigabe = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie();
        $freigabeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $freigabeObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($freigabe));
        $this->inject($this->subject, 'freigabe', $freigabeObjectStorageMock);

        $this->subject->addFreigabe($freigabe);
    }

    /**
     * @test
     */
    public function removeFreigabeFromObjectStorageHoldingFreigabe()
    {
        $freigabe = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Cookie();
        $freigabeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $freigabeObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($freigabe));
        $this->inject($this->subject, 'freigabe', $freigabeObjectStorageMock);

        $this->subject->removeFreigabe($freigabe);
    }
}

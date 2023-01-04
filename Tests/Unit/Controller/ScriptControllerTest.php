<?php

namespace Waconcookiemanagement\WaconCookieManagement\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class ScriptControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Waconcookiemanagement\WaconCookieManagement\Controller\ScriptController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Controller\ScriptController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllScriptsFromRepositoryAndAssignsThemToView()
    {
        $allScripts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $scriptRepository = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\ScriptRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $scriptRepository->expects(self::once())->method('findAll')->will(self::returnValue($allScripts));
        $this->inject($this->subject, 'scriptRepository', $scriptRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('scripts', $allScripts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}

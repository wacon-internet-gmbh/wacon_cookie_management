<?php
namespace Waconcookiemanagement\WaconCookieManagement\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Kerstin Schmitt <info@wacon.de>
 */
class NutzerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Waconcookiemanagement\WaconCookieManagement\Controller\NutzerController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Controller\NutzerController::class)
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
    public function listActionFetchesAllNutzersFromRepositoryAndAssignsThemToView()
    {

        $allNutzers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $nutzerRepository = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\NutzerRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $nutzerRepository->expects(self::once())->method('findAll')->will(self::returnValue($allNutzers));
        $this->inject($this->subject, 'nutzerRepository', $nutzerRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('nutzers', $allNutzers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenNutzerToView()
    {
        $nutzer = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('nutzer', $nutzer);

        $this->subject->showAction($nutzer);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenNutzerToNutzerRepository()
    {
        $nutzer = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();

        $nutzerRepository = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\NutzerRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutzerRepository->expects(self::once())->method('add')->with($nutzer);
        $this->inject($this->subject, 'nutzerRepository', $nutzerRepository);

        $this->subject->createAction($nutzer);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenNutzerToView()
    {
        $nutzer = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('nutzer', $nutzer);

        $this->subject->editAction($nutzer);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenNutzerInNutzerRepository()
    {
        $nutzer = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();

        $nutzerRepository = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\NutzerRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutzerRepository->expects(self::once())->method('update')->with($nutzer);
        $this->inject($this->subject, 'nutzerRepository', $nutzerRepository);

        $this->subject->updateAction($nutzer);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenNutzerFromNutzerRepository()
    {
        $nutzer = new \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Nutzer();

        $nutzerRepository = $this->getMockBuilder(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\NutzerRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutzerRepository->expects(self::once())->method('remove')->with($nutzer);
        $this->inject($this->subject, 'nutzerRepository', $nutzerRepository);

        $this->subject->deleteAction($nutzer);
    }
}

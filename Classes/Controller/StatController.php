<?php
namespace Waconcookiemanagement\WaconCookieManagement\Controller;
use TYPO3\CMS\Extbase\Annotation\Inject;
/***
 *
 * This file is part of the "Wacon Cookie Management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Kerstin Schmitt <info@wacon.de>, WACON Internet GmbH
 *
 ***/

/**
 * StatController
 */
class StatController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * statRepository
     *
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Repository\StatRepository

     */
    protected $statRepository = null;

         /**
     * Inject statRepository 
     *
     * @param  \Waconcookiemanagement\WaconCookieManagement\Domain\Repository\StatRepository $statRepository
     * @return void
     */
    
    public function injectStatRepository(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\StatRepository $statRepository) {
      $this->statRepository = $statRepository;
   }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if($this->request->hasArgument('jahr')){
            $jahr =$this->request->getArgument('jahr'); 
        }
        else{
            $jahr = date('Y');
        }
        
        if($this->request->hasArgument('monat')){
            $monat =$this->request->getArgument('monat'); 
        }
        else{
            $monat = date('n');
        }
        $firstyear = $this->statRepository->findFirstReports();
         // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($firstyear);
        if($firstyear['0']){
            $first =intval($firstyear['0']->getCreationDate()->format('Y'));
            $time = intval( date('Y',time()));
            while($time>=$first){
                $years[]=$time;
                $time-=1;
            }
        }
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($jahr);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($monat);

        $this->view->assign('years', $years);
        $this->view->assign('monat', $monat);
        $this->view->assign('jahr', $jahr);

        $reports[] = $this->statRepository->findReports($jahr,$monat,'max');
        $reports[] = $this->statRepository->findReports($jahr,$monat,'custom');
        $reports[] = $this->statRepository->findReports($jahr,$monat,'min');
        $this->view->assign('reports', $reports);
       
    }

    
    
}

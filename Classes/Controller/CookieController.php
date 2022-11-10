<?php
namespace Waconcookiemanagement\WaconCookieManagement\Controller;
use TYPO3\CMS\Extbase\Annotation\Inject;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
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
 * CookieController
 */
class CookieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * cookieRepository
     *
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Repository\CookieRepository

     */
    protected $cookieRepository = null;

        /**
     * Inject cookieRepository 
     *
     * @param  \Waconcookiemanagement\WaconCookieManagement\Domain\Repository\CookieRepository $cookieRepository
     * @return void
     */
    
    public function injectCookieRepository(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\CookieRepository $cookieRepository) 
    {
      $this->cookieRepository = $cookieRepository;
    }

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
      $change = $this->settings['change'];
      $cookie = $_COOKIE['waconcookiemanagement'] ?? null;
      if(strpos((string) $cookie,'setwcm')===0){
        $cookieneu = substr($cookie,6,3);
        
        $newStat = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Waconcookiemanagement\WaconCookieManagement\Domain\Model\Stat::class);
        if($cookieneu=='min') $newStat->setCookieconfig('min');
        elseif($cookieneu=='max') $newStat->setCookieconfig('max');
        else $newStat->setCookieconfig('custom');
        $newStat->setSeite($GLOBALS["TSFE"]->id);
 
        $cookies0 = $this->cookieRepository->findByKategorie(0);
        $this->statRepository->add($newStat);
         //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newStat);
        //setcookie("waconcookiemanagement", $cookieneu,time()+(3600*24*365));
      }
      $cookie = $_COOKIE['waconcookiemanagement'] ?? null;
      $cookiearray = explode('ts',(string) $cookie);
      if($change && !is_null($cookiearray['1'] ?? null)){
        if (substr((string) $cookiearray['1'],0,10) < $change)
            setcookie("waconcookiemanagement", "",time()-1);
      }

      $header = $this->settings['header'];
      $this->view->assign('header', $header);
      $teaser = $this->settings['teaser'];
      $this->view->assign('teaser', $teaser);
      $linktext = $this->settings['linktext'];
      $this->view->assign('linktext', $linktext);
 	      $imprint = $this->settings['imprint'];
        $this->view->assign('imprint', $imprint);
 	      $dataprotection = $this->settings['dataProtection'];
        $this->view->assign('dataprotection', $dataprotection );
        $nurlink = $this->settings['nurLink'];
        $this->view->assign('cookieanzeige', $nurlink);
        $cookies0 = $this->cookieRepository->findByKategorie(0);
        $this->view->assign('cookies0', $cookies0);
        $cookies1 = $this->cookieRepository->findByKategorie(1);
        $this->view->assign('cookies1', $cookies1);
        $cookies2 = $this->cookieRepository->findByKategorie(2);
        $this->view->assign('cookies2', $cookies2);
        $cookies3 = $this->cookieRepository->findByKategorie(3);
        $this->view->assign('cookies3', $cookies3);
       // $this->view->assign('cookieanzeige', '1');
       if($cookiearray['0']=="max"){
        $cookie1check = 1;
        $cookie2check = 1;
        $cookie3check = 1;
      }
      else{

      $cookies = explode('c',$cookiearray['0']);
      $cookie1check = 0;
      foreach($cookies1 as $check){
         if (in_array ( $check->getUid() , $cookies)) $cookie1check = 1;
      }
      $cookie2check = 0;
      foreach($cookies2 as $check){
         if (in_array ( $check->getUid() , $cookies)) $cookie2check = 1;
      }
      $cookie3check = 0;
      foreach($cookies3 as $check){
         if (in_array ( $check->getUid() , $cookies)) $cookie3check = 1;
      }
}
      $this->view->assign('cookie1check', $cookie1check);
      $this->view->assign('cookie2check', $cookie2check);
      $this->view->assign('cookie3check', $cookie3check);
   

    }

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $cookie = $_COOKIE['waconcookiemanagement'];
        $content1 = '';
        $content2 = $this->settings['bild'];

        $cObj = $this->configurationManager->getContentObject();
        $uid = $cObj->data['uid'];
        if(strpos($cookie,'setwcm') === 0){
            $cookie = substr($cookie,6);
        }
        $cookiearray = explode('ts', $cookie);

        if ($cookiearray[0]=='max') {
            $content1 = $this->settings['script'];
        }
        else{
            $res = explode("c",$cookiearray[0]);
            foreach ($res as $value){
                if ($value == $this->settings['cookie']) {
                    $content1 = $this->settings['script'];
                }
            }
        }

        $this->view->assign('cookietext', $this->settings['text']);
        $this->view->assign('content1', $content1);
        $this->view->assign('content2', $content2);
        $this->view->assign('uid', $uid);
        $this->view->assign('cookieuid', $this->settings['cookie']);
    }
}

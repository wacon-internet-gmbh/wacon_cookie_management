<?php
namespace Waconcookiemanagement\WaconCookieManagement\Controller;

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
     * @inject
     */
    protected $cookieRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

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


    }

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
$cookie = $_COOKIE['waconcookiemanagement']; 
$content2 = $this->settings['bild'];

if ($cookie=='max') $content1=$this->settings['script'];
else{
$res=explode("c",$cookie);
foreach($res as $value){

if($value == $this->settings['cookie'])$content1=$this->settings['script'];
}
}
        $this->view->assign('cookietext', $this->settings['text']);
        $this->view->assign('content1', $content1);
        $this->view->assign('content2', $content2);

    }
}

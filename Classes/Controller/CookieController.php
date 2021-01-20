<?php

namespace Waconcookiemanagement\WaconCookieManagement\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
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
 * CookieController
 */
class CookieController extends ActionController {

    /**
     * cookieRepository
     *
     * @Inject
     * @var \Waconcookiemanagement\WaconCookieManagement\Domain\Repository\CookieRepository
     */
    protected $cookieRepository;

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $this->view->assign('imprint', $this->settings['imprint']);
        $this->view->assign('dataprotection', $this->settings['dataProtection']);
        $this->view->assign('cookieanzeige', $this->settings['nurLink']);
        $this->view->assign('cookies0', $this->cookieRepository->findByKategorie(0));
        $this->view->assign('cookies1', $this->cookieRepository->findByKategorie(1));
        $this->view->assign('cookies2', $this->cookieRepository->findByKategorie(2));
        $this->view->assign('cookies3', $this->cookieRepository->findByKategorie(3));
    }

    /**
     * action show
     *
     * @return void
     */
    public function showAction() {
        $cookie = empty($_COOKIE['waconcookiemanagement']) ? '' : $_COOKIE['waconcookiemanagement'];
        $content1 = '';
        $content2 = $this->settings['bild'];

        if ($cookie === 'max') {
            $content1 = $this->settings['script'];
        } elseif($cookie && $cookie !== 'min') {
            $res = explode('c', $cookie);
            foreach ($res as $value) {
                $value = intval($value);
                if ($value && $value === intval($this->settings['cookie'])) {
                    $content1 = $this->settings['script'];
                    break;
                }
            }
        }

        $this->view->assign('uid', $this->configurationManager->getContentObjectRenderer()->data['uid']);
        $this->view->assign('cookietext', $this->settings['text']);
        $this->view->assign('content1', $content1);
        $this->view->assign('content2', $content2);
    }

}

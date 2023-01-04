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

    public function injectStatRepository(\Waconcookiemanagement\WaconCookieManagement\Domain\Repository\StatRepository $statRepository)
    {
        $this->statRepository = $statRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if ($this->request->hasArgument('jahr')) {
            $jahr =$this->request->getArgument('jahr');
        } else {
            $jahr = '';
        }

        if ($this->request->hasArgument('monat')) {
            $monat =$this->request->getArgument('monat');
        } else {
            $monat = '';
        }

        $firstyear = $this->statRepository->findFirstReports();
        $time = intval(date('Y', time()));
        $years[]=$time;
        $time-=1;
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($firstyear);
        if ($firstyear['0']) {
            $first =intval($firstyear['0']->getCreationDate()->format('Y'));
            while ($time>=$first) {
                $years[]=$time;
                $time-=1;
            }
        }

        if ($years) {
            $this->view->assign('years', $years);
        }
        $this->view->assign('monat', $monat);
        $this->view->assign('jahr', $jahr);

        $reports[] = $this->statRepository->findReports($jahr, $monat, 'max');
        $reports[] = $this->statRepository->findReports($jahr, $monat, 'custom');
        $reports[] = $this->statRepository->findReports($jahr, $monat, 'min');

        $reportpages = $this->statRepository->findReports($jahr, $monat, '');

        $pages = [];
        foreach ($reportpages as $reportpage) {
            // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($reportpage->getSeite());
            if ($reportpage->getSeite()) {
                if (array_key_exists($reportpage->getSeite(), $pages)) {
                    $pages[$reportpage->getSeite()] +=1;
                } else {
                    $pages[$reportpage->getSeite()] =1;
                }
            }
        }
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pages);
        arsort($pages);
        $i=0;
        foreach ($pages as $key => $value) {
            if ($i<10) {
                $site = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Site\SiteFinder::class)->getSiteByPageId($key);
                $url = (string)$site->getRouter()->generateUri($key);
                //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($url);
                if ($url) {
                    $shortpage['page'] = $url;
                } else {
                    $shortpage['page'] = $key;
                }
                $shortpage['count'] = $value;
                $shortpage['countmax'] = $this->statRepository->findReportspage($jahr, $monat, 'max', $key)->count();
                $shortpage['countmin'] = $this->statRepository->findReportspage($jahr, $monat, 'min', $key)->count();
                $shortpage['countcustom'] = $this->statRepository->findReportspage($jahr, $monat, 'custom', $key)->count();
                $shortpages[]=$shortpage;
                $i+=1;
            }
        }

        $this->view->assign('reports', $reports ?? null);
        $this->view->assign('reportpages', $reportpages ?? null);
        $this->view->assign('pages', $shortpages ?? null);
    }
}

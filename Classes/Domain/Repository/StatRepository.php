<?php
namespace Waconcookiemanagement\WaconCookieManagement\Domain\Repository;

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
 * The repository for Cookies
 */
class StatRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject() {
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findReports(string $jahr, string $monat, string $cookieconfig)
    {
        $query = $this->createQuery();

       $monthstart=mktime ( 0 , 0 , 0 , intval($monat) ,1 , intval($jahr) );
       $monthend=mktime ( 0 , 0 , 0 , intval($monat)+1 ,1 , intval($jahr) );
       $constraints = [];
       $constraints[] = $query->greaterThanOrEqual('crdate', $monthstart);
       $constraints[] = $query->lessThan('crdate', $monthend);
       $constraints[] = $query->like('cookieconfig', $cookieconfig);


        $query->matching($query->logicalAnd($constraints));
        return $query->execute();
    }

    public function findFirstReports()
    {
        $query = $this->createQuery();
       
        $query->setOrderings(
            [
                'crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ]
        );
        $query->setLimit(1);
        return $query->execute();
    }
    }
    

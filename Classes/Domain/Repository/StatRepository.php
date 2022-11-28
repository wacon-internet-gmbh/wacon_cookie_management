<?php
namespace Waconcookiemanagement\WaconCookieManagement\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

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

    public function deleteOldRecords($days) {
        
        $timestamp=time()+($days * 24*60*60);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($days);
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_waconcookiemanagement_domain_model_stat');
$affectedRows = $queryBuilder
   ->delete('tx_waconcookiemanagement_domain_model_stat')
   ->where(
      $queryBuilder->expr()->lt('crdate',$timestamp )
   )
   //->executeStatement();
   ->execute();
    }

    public function findReports(string $jahr, string $monat, string $cookieconfig)
    {
        $query = $this->createQuery();
        $constraints = [];
        if($jahr){
            if($monat){
                $monthstart=mktime ( 0 , 0 , 0 , intval($monat) ,1 , intval($jahr) );
                $monthend=mktime ( 0 , 0 , 0 , intval($monat)+1 ,1 , intval($jahr) );
            }
            else{ $monthstart=mktime ( 0 , 0 , 0 , 1 ,1 , intval($jahr) );
                $monthend=mktime ( 0 , 0 , 0 , 13 ,1 , intval($jahr) );
            }
            $constraints[] = $query->greaterThanOrEqual('crdate', $monthstart);
            $constraints[] = $query->lessThan('crdate', $monthend);
        }
        if($cookieconfig)$constraints[] = $query->like('cookieconfig', $cookieconfig);
    
        if($constraints)
        $query->matching($query->logicalAnd($constraints));
        return $query->execute();
    }

    public function findReportspage(string $jahr, string $monat, string $cookieconfig, int $page)
    {
        $query = $this->createQuery();
        $constraints = [];
        if($jahr){
            if($monat){
                $monthstart=mktime ( 0 , 0 , 0 , intval($monat) ,1 , intval($jahr) );
                $monthend=mktime ( 0 , 0 , 0 , intval($monat)+1 ,1 , intval($jahr) );
            }
            else{ $monthstart=mktime ( 0 , 0 , 0 , 1 ,1 , intval($jahr) );
                $monthend=mktime ( 0 , 0 , 0 , 13 ,1 , intval($jahr) );
            }
            $constraints[] = $query->greaterThanOrEqual('crdate', $monthstart);
            $constraints[] = $query->lessThan('crdate', $monthend);
        }
        if($cookieconfig)$constraints[] = $query->like('cookieconfig', $cookieconfig);
        if($page)$constraints[] = $query->like('seite', $page);
    
if($constraints)
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
    

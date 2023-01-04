<?php

namespace Waconcookiemanagement\WaconCookieManagement\Domain\Model;

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
 * Stat
 */
class Stat extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * cookieconfig
     *
     * @var string
     */
    protected $cookieconfig = '';

    /**
     * seite
     *
     * @var string
     */
    protected $seite = '';


    /**
     * Returns the cookieconfig
     *
     * @return string $cookieconfig
     */
    public function getCookieconfig()
    {
        return $this->cookieconfig;
    }

    /**
     * Sets the cookieconfig
     *
     * @param string $cookieconfig
     * @return void
     */
    public function setCookieconfig($cookieconfig)
    {
        $this->cookieconfig = $cookieconfig;
    }


    /**
     * Returns the seite
     *
     * @return string $seite
     */
    public function getSeite()
    {
        return $this->seite;
    }

    /**
     * Sets the seite
     *
     * @param string $seite
     * @return void
     */
    public function setSeite($seite)
    {
        $this->seite = $seite;
    }

    /**
    * @var \DateTime
    */
    protected $creationDate;

    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }
}

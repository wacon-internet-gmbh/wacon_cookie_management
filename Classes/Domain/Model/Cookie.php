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
 * Cookie
 */
class Cookie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * bezeichnung
     *
     * @var string
     */
    protected $bezeichnung = '';

    /**
     * kategorie
     *
     * @var string
     */
    protected $kategorie = '';

    /**
     * anbieter
     *
     * @var string
     */
    protected $anbieter = '';

    /**
     * zweck
     *
     * @var string
     */
    protected $zweck = '';

    /**
     * cookiename
     *
     * @var string
     */
    protected $cookiename = '';

    /**
     * laufzeit
     *
     * @var string
     */
    protected $laufzeit = '';

    /**
     * datenschutzlink
     *
     * @var string
     */
    protected $datenschutzlink = '';

    /**
     * host
     *
     * @var string
     */
    protected $host = '';

    /**
     * Returns the bezeichnung
     *
     * @return string $bezeichnung
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the bezeichnung
     *
     * @param string $bezeichnung
     * @return void
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
    }

    /**
     * Returns the kategorie
     *
     * @return string $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     *
     * @param string $kategorie
     * @return void
     */
    public function setKategorie($kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the anbieter
     *
     * @return string $anbieter
     */
    public function getAnbieter()
    {
        return $this->anbieter;
    }

    /**
     * Sets the anbieter
     *
     * @param string $anbieter
     * @return void
     */
    public function setAnbieter($anbieter)
    {
        $this->anbieter = $anbieter;
    }

    /**
     * Returns the zweck
     *
     * @return string $zweck
     */
    public function getZweck()
    {
        return $this->zweck;
    }

    /**
     * Sets the zweck
     *
     * @param string $zweck
     * @return void
     */
    public function setZweck($zweck)
    {
        $this->zweck = $zweck;
    }

    /**
     * Returns the cookiename
     *
     * @return string $cookiename
     */
    public function getCookiename()
    {
        return $this->cookiename;
    }

    /**
     * Sets the cookiename
     *
     * @param string $cookiename
     * @return void
     */
    public function setCookiename($cookiename)
    {
        $this->cookiename = $cookiename;
    }

    /**
     * Returns the laufzeit
     *
     * @return string $laufzeit
     */
    public function getLaufzeit()
    {
        return $this->laufzeit;
    }

    /**
     * Sets the laufzeit
     *
     * @param string $laufzeit
     * @return void
     */
    public function setLaufzeit($laufzeit)
    {
        $this->laufzeit = $laufzeit;
    }

    /**
     * Returns the datenschutzlink
     *
     * @return string $datenschutzlink
     */
    public function getDatenschutzlink()
    {
        return $this->datenschutzlink;
    }

    /**
     * Sets the datenschutzlink
     *
     * @param string $datenschutzlink
     * @return void
     */
    public function setDatenschutzlink($datenschutzlink)
    {
        $this->datenschutzlink = $datenschutzlink;
    }

    /**
     * Returns the host
     *
     * @return string $host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Sets the host
     *
     * @param string $host
     * @return void
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
}

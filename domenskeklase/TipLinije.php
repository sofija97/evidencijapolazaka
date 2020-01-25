<?php
class TipLinije implements JsonSerializable
{
    private $tipLinijeID;
    private $nazivTipaLinije;

    /**
     * TipLinije constructor.
     * @param $tipLinijeID
     * @param $nazivTipaLinije
     */
    public function __construct($tipLinijeID, $nazivTipaLinije)
    {
        $this->tipLinijeID = $tipLinijeID;
        $this->nazivTipaLinije = $nazivTipaLinije;
    }

    /**
     * @return mixed
     */
    public function getTipLinijeID()
    {
        return $this->tipLinijeID;
    }

    /**
     * @param mixed $tipLinijeID
     */
    public function setTipLinijeID($tipLinijeID)
    {
        $this->tipLinijeID = $tipLinijeID;
    }

    /**
     * @return mixed
     */
    public function getNazivTipaLinije()
    {
        return $this->nazivTipaLinije;
    }

    /**
     * @param mixed $nazivTipaLinije
     */
    public function setNazivTipaLinije($nazivTipaLinije)
    {
        $this->nazivTipaLinije = $nazivTipaLinije;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
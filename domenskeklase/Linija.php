<?php
class Linija implements JsonSerializable
{
    private $linijaID;
    private $brojLinije;
    private $od;
    private $do;
    private $tipLinije;

    /**
     * Linija constructor.
     * @param $linijaID
     * @param $brojLinije
     * @param $od
     * @param $do
     * @param $tipLinije
     */
    public function __construct($linijaID, $brojLinije, $od, $do, $tipLinije)
    {
        $this->linijaID = $linijaID;
        $this->brojLinije = $brojLinije;
        $this->od = $od;
        $this->do = $do;
        $this->tipLinije = $tipLinije;
    }

    /**
     * @return mixed
     */
    public function getLinijaID()
    {
        return $this->linijaID;
    }

    /**
     * @param mixed $linijaID
     */
    public function setLinijaID($linijaID)
    {
        $this->linijaID = $linijaID;
    }

    /**
     * @return mixed
     */
    public function getBrojLinije()
    {
        return $this->brojLinije;
    }

    /**
     * @param mixed $brojLinije
     */
    public function setBrojLinije($brojLinije)
    {
        $this->brojLinije = $brojLinije;
    }

    /**
     * @return mixed
     */
    public function getOd()
    {
        return $this->od;
    }

    /**
     * @param mixed $od
     */
    public function setOd($od)
    {
        $this->od = $od;
    }

    /**
     * @return mixed
     */
    public function getDo()
    {
        return $this->do;
    }

    /**
     * @param mixed $do
     */
    public function setDo($do)
    {
        $this->do = $do;
    }

    /**
     * @return mixed
     */
    public function getTipLinije()
    {
        return $this->tipLinije;
    }

    /**
     * @param mixed $tipLinije
     */
    public function setTipLinije($tipLinije)
    {
        $this->tipLinije = $tipLinije;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
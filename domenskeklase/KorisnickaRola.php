<?php

class KorisnickaRola implements JsonSerializable
{
    private $korsinickaRolaID;
    private $nazivRole;

    public function __construct($korsinickaRolaID, $nazivRole)
    {
        $this->korsinickaRolaID = $korsinickaRolaID;
        $this->nazivRole = $nazivRole;
    }

    /**
     * @return mixed
     */
    public function getKorsinickaRolaID()
    {
        return $this->korsinickaRolaID;
    }

    /**
     * @param mixed $korsinickaRolaID
     */
    public function setKorsinickaRolaID($korsinickaRolaID)
    {
        $this->korsinickaRolaID = $korsinickaRolaID;
    }

    /**
     * @return mixed
     */
    public function getNazivRole()
    {
        return $this->nazivRole;
    }

    /**
     * @param mixed $nazivRole
     */
    public function setNazivRole($nazivRole)
    {
        $this->nazivRole = $nazivRole;
    }



    public function jsonSerialize()
    {
        return json_encode(get_object_vars($this));
    }
}
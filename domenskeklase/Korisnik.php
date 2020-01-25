<?php
class Korisnik implements JsonSerializable
{
    private $korisnikID;
    private $imePrezime;
    private $korisnickoIme;
    private $korisnickaSifra;
    private $korisnickaRola;

    /**
     * Korisnik constructor.
     * @param $korisnikID
     * @param $imePrezime
     * @param $korisnickoIme
     * @param $korisnickaSifra
     * @param $korisnickaRola
     */
    public function __construct($korisnikID, $imePrezime, $korisnickoIme, $korisnickaSifra, $korisnickaRola)
    {
        $this->korisnikID = $korisnikID;
        $this->imePrezime = $imePrezime;
        $this->korisnickoIme = $korisnickoIme;
        $this->korisnickaSifra = $korisnickaSifra;
        $this->korisnickaRola = $korisnickaRola;
    }

    /**
     * @return mixed
     */
    public function getKorisnikID()
    {
        return $this->korisnikID;
    }

    /**
     * @param mixed $korisnikID
     */
    public function setKorisnikID($korisnikID)
    {
        $this->korisnikID = $korisnikID;
    }

    /**
     * @return mixed
     */
    public function getImePrezime()
    {
        return $this->imePrezime;
    }

    /**
     * @param mixed $imePrezime
     */
    public function setImePrezime($imePrezime)
    {
        $this->imePrezime = $imePrezime;
    }

    /**
     * @return mixed
     */
    public function getKorisnickoIme()
    {
        return $this->korisnickoIme;
    }

    /**
     * @param mixed $korisnickoIme
     */
    public function setKorisnickoIme($korisnickoIme)
    {
        $this->korisnickoIme = $korisnickoIme;
    }

    /**
     * @return mixed
     */
    public function getKorisnickaSifra()
    {
        return $this->korisnickaSifra;
    }

    /**
     * @param mixed $korisnickaSifra
     */
    public function setKorisnickaSifra($korisnickaSifra)
    {
        $this->korisnickaSifra = $korisnickaSifra;
    }

    /**
     * @return mixed
     */
    public function getKorisnickaRola()
    {
        return $this->korisnickaRola;
    }

    /**
     * @param mixed $korisnickaRola
     */
    public function setKorisnickaRola($korisnickaRola)
    {
        $this->korisnickaRola = $korisnickaRola;
    }

    public function jsonSerialize()
    {
        return json_encode(get_object_vars($this));
    }
}
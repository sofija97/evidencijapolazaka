<?php
class KomunikacijaSaBazom
{
    /** @var Mysqli $conn */
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','gsp');
        $this->conn->set_charset("utf8");
    }

    public function login($korisnickoIme,$korisncikaSifra)
    {
        $stmt = $this->conn->prepare("SELECT * FROM korisnik k join korisnickarola kr on k.korisnickaRolaID = kr.korisnickaRolaID WHERE korisnickoIme = ? AND korisnickaSifra = ?");
        $stmt->bind_param("ss", $korisnickoIme, $korisncikaSifra);
        $stmt->execute();

        $result = $stmt->get_result();

        $korisnik = null;

        while($red = $result->fetch_object()){
            $korisnik = new Korisnik($red->korisnikID,$red->imePrezime,$red->korisnickoIme,$red->korisnickaSifra,new KorisnickaRola($red->korisnickaRolaID,$red->nazivRole));
        }

        return $korisnik;
    }
}
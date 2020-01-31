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

    public function vratiLinije()
    {
        $stmt = $this->conn->prepare("SELECT * FROM linija l join tiplinije tl on l.tipLinijeID = tl.tipLinijeID");
        $stmt->execute();

        $result = $stmt->get_result();

        $linije = [];

        while($red = $result->fetch_object()){
            $linije[] = new Linija($red->linijaID,$red->brojLinije,$red->od,$red->do,new TipLinije($red->tipLinijeID,$red->nazivTipaLinije));
        }

        return $linije;
    }

    public function vratiPolaskeZaLiniju($linijaID)
    {
        $stmt = $this->conn->prepare("SELECT * FROM polazak p join linija l on p.linijaID = l.linijaID join tiplinije tl on l.tipLinijeID = tl.tipLinijeID WHERE l.linijaID = ".$linijaID);
        $stmt->execute();

        $result = $stmt->get_result();

        $polasci = [];

        while($red = $result->fetch_object()){
            $polasci[] = $red;
        }

        return $polasci;
    }

    public function vratiTipove()
    {
        $stmt = $this->conn->prepare("SELECT * FROM tiplinije ");
        $stmt->execute();

        $result = $stmt->get_result();

        $tipovi = [];

        while($red = $result->fetch_object()){
            $tipovi[] = $red;
        }

        return $tipovi;
    }

    public function sacuvajLiniju($brojLinije, $od, $do, $tip)
    {
        $stmt = $this->conn->prepare("INSERT INTO linija VALUES (null,?,?,?,?)");
        $stmt->bind_param("sssi", $brojLinije, $od,$do,$tip);
        return $stmt->execute();
    }
}
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

    public function obrisi($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM linija WHERE linijaID = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function sacuvajPolazak($linija, $sat, $minut, $korisnikID)
    {
        $stmt = $this->conn->prepare("INSERT INTO polazak VALUES (?,?,null,?,?)");
        $stmt->bind_param("iiii", $linija, $korisnikID,$sat,$minut);
        return $stmt->execute();
    }

    public function sacuvajKorisnika($imePrezime,$username,$password)
    {
        $stmt = $this->conn->prepare("INSERT INTO korisnik VALUES (null,?,?,?,1)");
        $stmt->bind_param("sss", $imePrezime, $username,$password);
        return $stmt->execute();
    }

    public function vratiKorisnike()
    {
        $stmt = $this->conn->prepare("SELECT korisnikID,imePrezime,korisnickoIme FROM korisnik where korisnickaRolaID = 1 ");
        $stmt->execute();

        $result = $stmt->get_result();

        $korisnici = [];

        while($red = $result->fetch_object()){
            $korisnici[] = $red;
        }

        return $korisnici;
    }

    public function promeniRolu($id)
    {
        $stmt = $this->conn->prepare("UPDATE korisnik set korisnickaRolaID = 2 where korisnikID = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function vratiPodatkeZaGrafik()
    {
        $stmt = $this->conn->prepare("SELECT sat,count(polazakID) as broj FROM polazak GROUP BY sat");
        $stmt->execute();

        $result = $stmt->get_result();

        $rezultati = [];

        while($red = $result->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }
}
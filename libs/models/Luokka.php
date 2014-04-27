<?php

class Luokka {

    private $id;
    private $otsikko;
    private $kuvaus;
    private $ylaluokka_id;

    public static function asetaAskareelleLuokka($askare_id, $luokka_id) {
        $sql = "INSERT INTO askareenluokat(luokka_id, askare_id) VALUES(?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($luokka_id, $askare_id));
    }

    public static function muokkaaAskareenLuokkaa($askare_id, $luokka_id) {
        $sql = "UPDATE askareenluokat SET luokka_id = ? WHERE askare_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($luokka_id, $askare_id));
    }

    public function lisaaKantaanYlaluokalla() {
        $sql = "INSERT INTO luokka(otsikko, kuvaus, ylaluokka_id) VALUES(?,?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->otsikko,
            $this->kuvaus,
            $this->ylaluokka_id));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function lisaaKantaanIlmanylaLuok() {
        $sql = "INSERT INTO luokka(otsikko, kuvaus) VALUES(?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->otsikko, $this->kuvaus));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function poistaKannasta() {
        $sql = "DELETE FROM luokka WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
    }

    public static function haeKaikkiLuokat() {
        $sql = "SELECT id, otsikko, kuvaus, ylaluokka_id FROM luokka order by otsikko";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();


        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $luokka = new Luokka();

            $luokka->setId($tulos->id);
            $luokka->setOtsikko($tulos->otsikko);
            $luokka->setKuvaus($tulos->kuvaus);
            $luokka->setYlaluokka_id($tulos->ylaluokka_id);

            $tulokset[] = $luokka;
        }
        return $tulokset;
    }

    public static function haeLuokka($id) {
        $sql = "SELECT id, otsikko, kuvaus, ylaluokka_id from luokka where id=? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $luokka = new Luokka();

            $luokka->setId($tulos->id);
            $luokka->setOtsikko($tulos->otsikko);
            $luokka->setKuvaus($tulos->kuvaus);
            $luokka->setYlaluokka_id($tulos->ylaluokka_id);

            return $luokka;
        }
    }

    public static function haeAskareenLuokka($askare_id) {
        $sql = "SELECT luokka_id FROM askareenluokat where askare_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($askare_id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            return $tulos->luokka_id;
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setOtsikko($otsikko) {
        $this->otsikko = siistiString($otsikko);

        if (trim($this->otsikko) == '') {
            $this->virheet['otsikko'] = "Sinun täytyy antaa otsikko.";
        } else {
            unset($this->virheet['otsikko']);
        }
    }

    public function setKuvaus($kuvaus) {
        $this->kuvaus = siistiString($kuvaus);
    }

    public function setYlaluokka_id($ylaluokka_id) {
        $this->ylaluokka_id = $ylaluokka_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getOtsikko() {
        return $this->otsikko;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function getYlaluokka_id() {
        return $this->ylaluokka_id;
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function onkoYlaluokkaa() {
        return empty($this->ylaluokka_id);
    }

}

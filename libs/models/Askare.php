<?php

/**
 * @author Mikael Wide
 */
class Askare {

    private $id;
    private $otsikko;
    private $valmis;
    private $lisayspvm;
    private $user_id;
    private $kuvaus;
    private $prioriteetti_id;
    private $virheet = array();

    public function paivitaKantaan() {
        $sql = "UPDATE askare SET otsikko = ?, valmis = ?, kuvaus = ?, prioriteetti_id = ?  WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getOtsikko(),
            $this->getValmis(),
            $this->getKuvaus(),
            $this->getPrioriteetti_id(),
            $this->getId()));
        if ($ok) {
            
        }
        return $ok;
    }

    public function poistaKannasta() {
        $sql = "DELETE FROM askare WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO askare(otsikko, user_id, kuvaus, prioriteetti_id) VALUES(?,?,?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->otsikko, $this->user_id, $this->kuvaus, $this->prioriteetti_id));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public static function etsiKaikkiAskareet() {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus, prioriteetti_id FROM askare order by valmis DESC";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();


        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $askare = new Askare();

            $askare->setId($tulos->id);
            $askare->setOtsikko($tulos->otsikko);
            $askare->setValmis($tulos->valmis);
            $askare->setLisayspvm($tulos->lisayspvm);
            $askare->setUser_id($tulos->user_id);
            $askare->setKuvaus($tulos->kuvaus);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            $tulokset[] = $askare;
        }
        return $tulokset;
    }

    public static function etsiAskareId($id) {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus, prioriteetti_id FROM askare where id = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $askare = new Askare();

            $askare->setId($tulos->id);
            $askare->setOtsikko($tulos->otsikko);
            $askare->setValmis($tulos->valmis);
            $askare->setLisayspvm($tulos->lisayspvm);
            $askare->setUser_id($tulos->user_id);
            $askare->setKuvaus($tulos->kuvaus);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            return $askare;
        }
    }

    public static function etsiKayttajanAskareet($id) {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus, prioriteetti_id FROM askare WHERE user_id = $id ORDER by valmis DESC ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $askare = new Askare();

            $askare->setId($tulos->id);
            $askare->setOtsikko($tulos->otsikko);
            $askare->setValmis($tulos->valmis);
            $askare->setLisayspvm($tulos->lisayspvm);
            $askare->setUser_id($tulos->user_id);
            $askare->setKuvaus($tulos->kuvaus);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            $tulokset[] = $askare;
        }
        return $tulokset;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setOtsikko($otsikko) {
        $this->otsikko = siistiString($otsikko);

        if (trim($this->otsikko) == '') {
            $this->virheet['otsikko'] = "Sinun täytyy antaa otsikko!";
        } else {
            unset($this->virheet['otsikko']);
        }
    }

    public function setValmis($valmis) {
        if ($valmis) {
            $this->valmis = 1;
        } else
            $this->valmis = 0;
    }

    public function setLisayspvm($lisayspvm) {
        $this->lisayspvm = $lisayspvm;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setKuvaus($kuvaus) {
        $this->kuvaus = siistiString($kuvaus);
    }

    public function setPrioriteetti_id($prioriteetti_id) {
        $this->prioriteetti_id = $prioriteetti_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getOtsikko() {
        return $this->otsikko;
    }

    public function getValmis() {
        return $this->valmis;
    }

    public function getLisayspvm() {
        return $this->lisayspvm;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function getPrioriteetti_id() {
        if (!isset($this->prioriteetti_id)) {
            return 1;
        }
        return $this->prioriteetti_id;
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function vaihdaValmis() {
        if ($this->valmis) {
            $this->valmis = 0;
        } else {
            $this->valmis = 1;
        }
    }

//    public static function haePrioriteetti() {
//        $sql = "SELECT id, otsikko, prioriteetti FROM tarkeysaste WHERE id = $this->prioriteetti_id";
//        $kysely = getTietokantayhteys()->prepare($sql);
//        $kysely->execute();
//
//        $tulos = $kysely->fetchObject();
//        if ($tulos == null) {
//            return null;
//        } else {
//            $askare = new Askare();
//
//            $askare->setId($tulos->id);
//            $askare->setOtsikko($tulos->otsikko);
//            $askare->setValmis($tulos->valmis);
//            $askare->setLisayspvm($tulos->lisayspvm);
//            $askare->setUser_id($tulos->user_id);
//            $askare->setKuvaus_id($tulos->kuvaus_id);
//            $askare->setPrioriteetti_id($tulos->prioriteetti_id);
//
//            return $askare;
//        }
//    }
}

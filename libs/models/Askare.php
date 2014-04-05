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
    private $kuvaus_id;
    private $prioriteetti_id;

    public static function etsiKaikkiAskareet() {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus_id, prioriteetti_id FROM askare order by valmis DESC";
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
            $askare->setKuvaus_id($tulos->kuvaus_id);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            $tulokset[] = $askare;
        }
        return $tulokset;
    }

    public static function etsiAskareId($id) {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus_id, prioriteetti_id FROM askare where id = ? LIMIT 1";
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
            $askare->setKuvaus_id($tulos->kuvaus_id);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            return $askare;
        }
    }

    public static function etsiKayttajanAskareet($id) {
        $sql = "SELECT id, otsikko, valmis, lisayspvm, user_id, kuvaus_id, prioriteetti_id FROM askare WHERE user_id = $id";
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
            $askare->setKuvaus_id($tulos->kuvaus_id);
            $askare->setPrioriteetti_id($tulos->prioriteetti_id);

            $tulokset[] = $askare;
        }
        return $tulokset;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function setOtsikko($otsikko) {
        $this->otsikko = $otsikko;
    }

    private function setValmis($valmis) {
        $this->valmis = $valmis;
    }

    private function setLisayspvm($lisayspvm) {
        $this->lisayspvm = $lisayspvm;
    }

    private function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    private function setKuvaus_id($kuvaus_id) {
        $this->kuvaus_id = $kuvaus_id;
    }

    private function setPrioriteetti_id($prioriteetti_id) {
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

    public function getKuvaus_id() {
        return $this->kuvaus_id;
    }

    public function getPrioriteetti_id() {
        return $this->prioriteetti_id;
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

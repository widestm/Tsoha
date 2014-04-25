<?php

class Prioriteetti {

    private $id;
    private $otsikko;
    private $prioriteetti;
    private $virheet = array();

    public static function haePrioriteetti($i) {
        $sql = "SELECT id, otsikko, prioriteetti FROM tarkeysaste WHERE id =$i ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $prior = new Prioriteetti();

            $prior->setId($tulos->id);
            $prior->setOtsikko($tulos->otsikko);
            $prior->setPrioriteetti($tulos->prioriteetti);
            return $prior;
        }
    }

    public static function haePrioriteetit() {
        $sql = "SELECT id, otsikko, prioriteetti FROM tarkeysaste ORDER BY prioriteetti desc";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $prio = new Prioriteetti();

            $prio->setId($tulos->id);
            $prio->setOtsikko($tulos->otsikko);
            $prio->setPrioriteetti($tulos->prioriteetti);
            $tulokset[] = $prio;
        }
        return $tulokset;
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO tarkeysaste(otsikko, prioriteetti) VALUES(?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getOtsikko(), $this->getPrioriteetti()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function poistaKannasta() {
        $sql = "DELETE FROM tarkeysaste WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
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

    public function setPrioriteetti($prioriteetti) {
        $this->prioriteetti = $prioriteetti;
    }

    public function getId() {
        if (!isset($this->id)) {
            return 1;
        }
        return $this->id;
    }

    public function getOtsikko() {
        return $this->otsikko;
    }

    public function getPrioriteetti() {
        return $this->prioriteetti;
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

}

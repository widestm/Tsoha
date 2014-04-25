<?php

class Prioriteetti {

    private $id;
    private $otsikko;
    private $prioriteetti;

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

    public function setId($id) {
        $this->id = $id;
    }

    public function setOtsikko($otsikko) {
        $this->otsikko = $otsikko;
    }

    public function setPrioriteetti($prioriteetti) {
        $this->prioriteetti = $prioriteetti;
    }

    public function getId() {
        return $this->id;
    }

    public function getOtsikko() {
        return $this->otsikko;
    }

    public function getPrioriteetti() {
        return $this->prioriteetti;
    }

}

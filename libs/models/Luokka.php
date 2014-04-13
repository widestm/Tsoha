<?php



class Luokka {

    private $id;
    private $otsikko;
    private $kuvaus;
    private $ylaluokka_id;

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

    private function setId($id) {
        $this->id = $id;
    }

    private function setOtsikko($otsikko) {
        $this->otsikko = $otsikko;

        if (trim($this->otsikko) == '') {
            $this->virheet['otsikko'] = "Nimi ei saa olla tyhjä.";
        } else {
            unset($this->virheet['otsikko']);
        }
    }

    private function setKuvaus($kuvaus) {
        $this->kuvaus = $kuvaus;
    }

    private function setYlaluokka_id($ylaluokka_id) {
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

}

<?php

class Kayttaja {

    private $id;
    private $kayttajanimi;
    private $salasana;

    public static function etsiKaikkiKayttajat() {
        $sql = "SELECT id, kayttajanimi, salasana FROM users";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();

            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->kayttajanimi);
            $kayttaja->setSalasana($tulos->salasana);

            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT id, kayttajanimi, salasana from users where kayttajanimi = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->kayttajanimi);
            $kayttaja->setSalasana($tulos->salasana);

            return $kayttaja;
        }
    }

    public function getKayttajaTunnus() {
        return $this->kayttajanimi;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTunnus($kayttajanimi) {
        $this->kayttajanimi = $kayttajanimi;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

}

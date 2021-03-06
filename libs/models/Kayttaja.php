<?php

class Kayttaja {

    private $id;
    private $kayttajanimi;
    private $salasana;
    private $virheet = array();

    public function paivitaKantaan() {
        $sql = "UPDATE users SET kayttajanimi = ?, salasana = ? WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array(
            $this->getKayttajaTunnus(),
            $this->getSalasana(),
            $this->getId()));
        if ($ok) {
            
        }
        return $ok;
    }

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

    public static function etsiKayttajaId($id) {
        $sql = "SELECT id, kayttajanimi, salasana from users where id=? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

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

    public function lisaaKantaan() {
        $sql = "INSERT INTO users(kayttajanimi, salasana) VALUES(?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->kayttajanimi, $this->salasana));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function poistaKannasta() {
        $sql = "DELETE FROM users WHERE id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getId()));
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
        $this->kayttajanimi = siistiString($kayttajanimi);

        if (trim($this->kayttajanimi) == '') {
            $this->virheet['kayttajanimi'] = "Sinun täytyy antaa tunnus!";
        } else {
            unset($this->virheet['kayttajanimi']);
        }
    }

    public function setSalasana($salasana) {
        $this->salasana = siistiString($salasana);

        if (trim($this->salasana) == '') {
            $this->virheet['salasana'] = "Sinun täytyy antaa salasana!";
        } else {
            unset($this->virheet['salasana']);
        }
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

}

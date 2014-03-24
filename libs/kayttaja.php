<?php

class Kayttaja {

    private $id;
    private $tunnus;
    private $salasana;

    public function __construct($id, $tunnus, $salasana) {
        $this->id = $id;
        $this->tunnus = $tunnus;
        $this->salasana = $salasana;
    }

    public static function etsiKaikkiKayttajat() {
        $sql = "SELECT id, kayttajanimi, salasana FROM users";
        
        $kysely = getTietokantayhteys()->prepare($sql);
        if (!$kysely) {
            echo "Virhe: ";
            print_r($kysely->errorInfo());
        }
        #$kysely = getTietokantayhteys()->prepare($sql);
        echo 'e3';

        $kysely->execute();
        echo 'e4';

        $tulokset = array();
        echo 'e5';

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();

            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->tunnus);
            $kayttaja->setSalanana($tulos->salasana);

            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    public function getKayttajaTunnus() {
        return $this->tunnus;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function setTunnus($tunnus) {
        $this->tunnus = $tunnus;
    }

    private function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

}


INSERT INTO users (kayttajanimi, salasana) VALUES
  ('tester', 'password'),
  ('admin', 'admin')
;

INSERT INTO kuvaus (kuvausteksti) VALUES
  ('askarekuvaus1'),
  ('aksarekuvaus2'),
  ('kotityökuvaus'),
  ('luokka2')
;

INSERT INTO luokka (otsikko, kuvaus_id, ylaluokka_id) VALUES
  ('Kotityöt', 3, NULL),
  ('luokka2', 4, NULL),
  ('Laskut', 1, 1),
  ('Tira', 2, 2)
;

INSERT INTO tarkeysaste (otsikko, prioriteetti) VALUES
  ('ERITTÄIN TÄRKEÄ', 5),
  ('Ei niin tärkeä', 2),
  ('Ehkä huomenna', 1)
;

INSERT INTO askare (otsikko, valmis, user_id, kuvaus_id, prioriteetti_id) VALUES
  ('tsoha', false, (SELECT id FROM users WHERE kayttajanimi = 'tester'), 
  (SELECT id FROM kuvaus WHERE kuvausteksti = 'askarekuvaus1'),
  (SELECT id FROM tarkeysaste WHERE otsikko='Ehkä huomenna')),
  ('tiskaa', false, (SELECT id FROM users WHERE kayttajanimi = 'admin'), 
  (SELECT id FROM kuvaus WHERE kuvausteksti = 'kotityökuvaus'),
  (SELECT id FROM tarkeysaste WHERE otsikko='ERITTÄIN TÄRKEÄ'))
;

INSERT INTO askareenluokat(askare_id, luokka_id) VALUES
  (1, 2),
  (2, 1),
  (2, 2)
;


    
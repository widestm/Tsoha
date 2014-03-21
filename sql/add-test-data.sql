
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

INSERT INTO luokka (otsikko, kuvaus_id) VALUES
  ('Kotityöt', (SELECT id FROM kuvaus WHERE kuvausteksti = 'kotityökuvaus')),
  ('luokka2', (SELECT id FROM kuvaus WHERE kuvausteksti = 'luokka2'))
;

INSERT INTO tarkeysaste (otsikko, prioriteetti) VALUES
  ('ERITTÄIN TÄRKEÄ', 5),
  ('Ei niin tärkeä', 2),
  ('Ehkä huomenna', 1)
;

INSERT INTO askareet (otsikko, valmis, user_id, kuvaus_id, prioriteetti_id, luokka_id) VALUES
  ('tsoha', false, (SELECT id FROM users WHERE kayttajanimi = 'tester'), 
  (SELECT id FROM kuvaus WHERE kuvausteksti = 'askarekuvaus1'),
  (SELECT id FROM tarkeysaste WHERE otsikko='Ehkä huomenna'),
  (SELECT id FROM luokka WHERE otsikko = 'luokka2')),
  ('tiskaa', false, (SELECT id FROM users WHERE kayttajanimi = 'admin'), 
  (SELECT id FROM kuvaus WHERE kuvausteksti = 'kotityökuvaus'),
  (SELECT id FROM tarkeysaste WHERE otsikko='ERITTÄIN TÄRKEÄ'),
  (SELECT id FROM luokka WHERE otsikko = 'Kotityöt'))
;



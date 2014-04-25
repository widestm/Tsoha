
INSERT INTO users (kayttajanimi, salasana) VALUES
  ('tester', 'password'),
  ('admin', 'admin')
;

-- INSERT INTO kuvaus (kuvausteksti) VALUES
--  ('askarekuvaus1'),
--  ('aksarekuvaus2'),
--  ('kotityökuvaus'),
--  ('luokka2')
--;

INSERT INTO luokka (otsikko, kuvaus, ylaluokka_id) VALUES
  ('Kotityöt', 'kotityökuvaus', NULL),
  ('luokka2', 'luokka2kuvaus', NULL),
  ('Laskut', 'laskukuvaus', 1),
  ('Tira', 'tiraluokkakuvaus', 2)
;

INSERT INTO tarkeysaste (otsikko, prioriteetti) VALUES
  ('ei asetettu' , 0 ),  
  ('ERITTÄIN TÄRKEÄ', 5),
  ('Tärkeä', 3),
  ('Nah', 2),
  ('Ehkä huomenna', 1)
;

INSERT INTO askare (otsikko, valmis, user_id, kuvaus, prioriteetti_id) VALUES
  ('Tsoha', false, 1, 'askarekuvaus1',
  (SELECT id FROM tarkeysaste WHERE otsikko='Ehkä huomenna')),
  ('Tiskaa', true, 2, 'et ole vieläkään tiskannut',
  (SELECT id FROM tarkeysaste WHERE otsikko='Ehkä huomenna')),
  ('Sähkölasku', false, 2, 'Helsingin energia',
  (SELECT id FROM tarkeysaste WHERE otsikko='ERITTÄIN TÄRKEÄ')),
  ('Tira', false, 2, 'Pajatehtävät',
  (SELECT id FROM tarkeysaste WHERE otsikko='Tärkeä')),
  ('Herää', true, 1, 3, 4),
  ('Harjaa hampaat', true, 2, 2, 1)
;

INSERT INTO askareenluokat(askare_id, luokka_id) VALUES
  (1, 2),
  (2, 1),
  (2, 2),
  (3, 3),
  (4, 4)
;


  
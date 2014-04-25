
-- Käyttäjätaulun luonti

CREATE TABLE users (
  id serial PRIMARY KEY,
  kayttajanimi varchar UNIQUE NOT NULL,
  salasana varchar NOT NULL
);

-- Kuvaustaulun luonti
-- !!  Kuvaustulu poistettu käytöstä kokonaan  !!
--CREATE TABLE kuvaus (
--  id serial PRIMARY KEY,
--  kuvausteksti text NOT NULL
--);


-- Luokkataulun luonti

CREATE TABLE luokka (
  id serial PRIMARY KEY,
  otsikko varchar NOT NULL,
  kuvaus text,
  ylaluokka_id integer REFERENCES luokka(id)
);

-- Tärkeysastetaulun luonti

CREATE TABLE tarkeysaste (
  id serial PRIMARY KEY,
  otsikko varchar NOT NULL,
  prioriteetti integer NOT NULL
);


-- Askaretaulun luonti

CREATE TABLE askare (
  id serial PRIMARY KEY,
  otsikko varchar NOT NULL,
  valmis boolean DEFAULT FALSE,
  lisayspvm date NOT NULL DEFAULT CURRENT_DATE,
  user_id integer REFERENCES users(id) ON DELETE CASCADE,
  kuvaus text NOT NULL,
  prioriteetti_id integer REFERENCES tarkeysaste(id) ON DELETE SET NULL
);

CREATE TABLE askareenluokat (
  id serial PRIMARY KEY,
  askare_id integer REFERENCES askare(id) ON DELETE SET NULL,  
  luokka_id integer REFERENCES luokka(id) ON DELETE SET NULL
);




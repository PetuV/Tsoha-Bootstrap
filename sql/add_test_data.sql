-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Player (username, password, isadmin) VALUES ('Testimies', 'salasana', FALSE);
INSERT INTO Player (username, password, isadmin) VALUES ('Testiäijä', 'salasana', FALSE);
INSERT INTO Game (name, dev, released, genre) VALUES ('Muukalaismarssi', 'Pehmoneliö', '2009-09-09', 'Roolipeli');
INSERT INTO Game (name, dev, released, genre) VALUES ('Rubiinin kuutio', 'Devaajat', '2015-05-25', 'Puzzle');
INSERT INTO Game (name, dev, released, genre) VALUES ('Kaukokarjaisu', 'Salaseura', '2010-07-10', 'Räiskintä');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (1, 1, 3, FALSE);
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (1, 2, 5, TRUE);
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (2, 3, 2, FALSE);
INSERT INTO Request (player, name, dev, released, genre) VALUES (1, 'Muukalaismarssi 2', 'Pehmoneliö', '2010-10-10', 'Roolipeli');
-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Player (username, password) VALUES ('Testimies', 'salasana');
INSERT INTO Player (username, password) VALUES ('PeliPertti', 'salainensana');
INSERT INTO Player (username, password) VALUES ('Keisarinna', 'valtasana');
INSERT INTO Player (username, password) VALUES ('MahtiMursu', 'mahtisana');
INSERT INTO Player (username, password) VALUES ('AGrill', 'grillisana');
INSERT INTO Player (username, password) VALUES ('Skullguy02', 'secret');
INSERT INTO Player (username, password) VALUES ('Alfonso', 'AF123');
INSERT INTO Player (username, password) VALUES ('Nimetön', 'sanaton');
INSERT INTO Player (username, password) VALUES ('LaulaaTyökseen', 'lalala');
INSERT INTO Player (username, password) VALUES ('Alaviiva', 'erikoismerkki');
INSERT INTO Game (name, dev, released, genre) VALUES ('Muukalaismarssi', 'Pehmoneliö', '2009-09-09', 'Roolipeli');
INSERT INTO Game (name, dev, released, genre) VALUES ('Rubiinin kuutio', 'Devaajat', '2015-05-25', 'Puzzle');
INSERT INTO Game (name, dev, released, genre) VALUES ('Kaukokarjaisu', 'Salaseura', '2010-07-10', 'Räiskintä');
INSERT INTO Game (name, dev, released, genre) VALUES ('Heimot', 'Devaajat', '2008-06-10', 'Räiskintä');
INSERT INTO Game (name, dev, released, genre) VALUES ('Muukalaismarssi 2', 'Pehmoneliö', '2012-12-12', 'Roolipeli');
INSERT INTO Game (name, dev, released, genre) VALUES ('Valtakuntien aikakausi', 'Vanhat äijät', '1997-12-18', 'Strategia');
INSERT INTO Game (name, dev, released, genre) VALUES ('Nii-o', 'The Weebs', '2017-02-16', 'Toiminta');
INSERT INTO Game (name, dev, released, genre) VALUES ('Roboralli 2k18', 'Vanhat äijät', '2017-04-01', 'Urheilu');
INSERT INTO Game (name, dev, released, genre) VALUES ('Rajamaat', 'Salaseura', '2009-07-14', 'Räiskintä');
INSERT INTO Game (name, dev, released, genre) VALUES ('Aikamatka', 'Pehmoneliö', '2016-11-30', 'Roolipeli');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (1, 1, 3, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (1, 2, 5, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (1, 3, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (2, 7, 4, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (2, 8, 4, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (4, 5, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (3, 7, 5, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (4, 2, 4, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (3, 3, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (3, 6, 1, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (5, 2, 2, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (5, 8, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (5, 5, 2, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (2, 2, 3, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (3, 8, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (6, 1, 2, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (6, 2, 5, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (7, 3, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (6, 10, 5, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (6, 5, 1, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (7, 10, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (7, 1, 4, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (7, 4, 2, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (8, 3, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (8, 4, 3, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (9, 2, 3, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (9, 3, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (8, 8, 1, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (10, 2, 5, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (9, 6, 3, 'Aloittamatta');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (10, 1, 1, 'Kesken');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (10, 4, 5, 'Läpäisty');
INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (10, 9, 3, 'Aloittamatta');
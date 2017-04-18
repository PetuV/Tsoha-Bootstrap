-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Player(
	id SERIAL PRIMARY KEY, 
	username varchar(50) NOT NULL, 
	password varchar(50) NOT NULL, 
	isadmin boolean DEFAULT FALSE
);

CREATE TABLE Game(
	id SERIAL PRIMARY KEY, 
	name varchar(255) NOT NULL, 
	dev varchar(50), 
	released date, 
	genre varchar(50)
);

CREATE TABLE PlayerGame(
	player_id INTEGER REFERENCES Player(id) ON DELETE CASCADE, 
	game_id INTEGER REFERENCES Game(id) ON DELETE CASCADE, 
	rating INTEGER, 
	completed varchar(50)
);

CREATE TABLE Request(
	id SERIAL PRIMARY KEY, 
	player INTEGER REFERENCES Player(id), 
	name varchar(255) NOT NULL, 
	dev varchar(50), 
	released date, 
	genre varchar(50)
);
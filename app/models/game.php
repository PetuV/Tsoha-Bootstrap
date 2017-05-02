<?php
class Game extends BaseModel{
	public $id, $name, $dev, $released, $genre, $rating, $completed;

	public function __construct($attributes){
		parent::__construct($attributes);
    $this->validators = array('validate_name', 'validate_dev', 'validate_released', 'validate_genre');
	}

	public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Game');
    $query->execute();
    $rows = $query->fetchAll();
    $games = array();

    foreach($rows as $row){
      $games[] = new Game(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'dev' => $row['dev'],
        'released' => $row['released'],
        'genre' => $row['genre']
      ));
    }

    return $games;
  }

  public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Game WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $game = new Game(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'dev' => $row['dev'],
        'released' => $row['released'],
        'genre' => $row['genre']
      ));

      return $game;
    }

    return null;
  }

  public static function findByUser($user_id){
    $query = DB::connection()->prepare('SELECT Game.id, Game.name, Game.dev, Game.released, Game.genre, PlayerGame.rating, PlayerGame.completed FROM Game INNER JOIN PlayerGame ON Game.id = PlayerGame.game_id WHERE PlayerGame.player_id = :user_id');
    $query->execute(array('user_id' => $user_id));
    $rows = $query->fetchAll();
    $games = array();

    foreach($rows as $row){
      $games[] = new Game(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'dev' => $row['dev'],
        'released' => $row['released'],
        'genre' => $row['genre'],
        'rating' => $row['rating'],
        'completed' => $row['completed']
      ));
    }

    return $games;
  }

  public static function findByUserAndId($user_id, $game_id){
    $query = DB::connection()->prepare('SELECT Game.id, Game.name, Game.dev, Game.released, Game.genre, PlayerGame.rating, PlayerGame.completed FROM Game INNER JOIN PlayerGame ON Game.id = PlayerGame.game_id WHERE PlayerGame.player_id = :user_id AND PlayerGame.game_id = :game_id LIMIT 1');
    $query->execute(array('user_id' => $user_id, 'game_id' => $game_id));
    $row = $query->fetch();
    $games = array();

    if($row){
      $game = new Game(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'dev' => $row['dev'],
        'released' => $row['released'],
        'genre' => $row['genre'],
        'rating' => $row['rating'],
        'completed' => $row['completed']
      ));

      return $game;
    }
    return null;
  }

  public function save(){
    $query = DB::connection()->prepare('INSERT INTO Game (name, dev, released, genre) VALUES (:name, :dev, :released, :genre) RETURNING id');
    $query->execute(array('name' => $this->name, 'dev' => $this->dev, 'released' => $this->released, 'genre' => $this->genre));
    $row = $query->fetch();
    $this->id = $row['id'];
  }

  public function update(){
    $query = DB::connection()->prepare('UPDATE Game SET name = :name, dev = :dev, released = :released, genre = :genre WHERE id = :id');
    $query->execute(array('name' => $this->name, 'dev' => $this->dev, 'released' => $this->released, 'genre' => $this->genre, 'id' => $this->id));
  }

  public function destroy(){
    $query = DB::connection()->prepare('DELETE FROM Game WHERE id = :id');
    $query->execute(array('id' => $this->id));
  }

  public function validate_name(){
    $errors = array();
    $error = $this->validate_null($this->name);
    if (strlen($error) > 0) {
      $errors[] = 'Pelillä on oltava nimi.';
    }
    return $errors;
  }

  public function validate_dev(){
    $errors = array();
    $error = $this->validate_null($this->dev);
    if (strlen($error) > 0) {
      $errors[] = 'Pelillä on oltava kehittäjä.';
    }
    return $errors;
  }

  public function validate_released(){
    $errors = array();
    $error = $this->validate_null($this->released);
    if (strlen($error) > 0) {
      $errors[] = 'Pelillä on oltava julkaisupäivä.';
    }
    $error = $this->validate_date($this->released);
    if (strlen($error) > 0) {
      $errors[] = 'Anna päivämäärä muodossa DD.MM.YYYY';
    }
    return $errors;
  }

  public function validate_genre(){
    $errors = array();

    $error = $this->validate_null($this->genre);
    if (strlen($error) > 0) {
      $errors[] = 'Pelillä on oltava genre.';
    }

    return $errors;
  }
}
<?php
class Game extends BaseModel{
	public $id, $name, $dev, $released, $genre;

	public function __construct($attributes){
		parent::__construct($attributes);
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

  public function save(){
    $query = DB::connection()->prepare('INSERT INTO Game (name, dev, released, genre) VALUES (:name, :dev, :released, :genre) RETURNING id');
    $query->execute(array('name' => $this->name, 'dev' => $this->dev, 'released' => $this->released, 'genre' => $this->genre));
    $row = $query->fetch();
    $this->id = $row['id'];
  }
}
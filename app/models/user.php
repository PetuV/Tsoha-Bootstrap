<?php
class User extends BaseModel{
	public $id, $username, $password, $isadmin;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public function authenticate($name, $pass) {
		$query = DB::connection()->prepare('SELECT * FROM Player WHERE username = :name AND password = :password LIMIT 1');
		$query->execute(array('name' => $name, 'password' => $pass));
		$row = $query->fetch();
		if($row){
			$user = new User(array(
	        'id' => $row['id'],
	        'username' => $row['username'],
	        'password' => $row['password'],
	        'isadmin' => $row['isadmin']
	      	));

	      	return $user;
		}else{
			return null;
		}
	}

	public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Player WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $user = new User(array(
        'id' => $row['id'],
        'username' => $row['username'],
        'password' => $row['password'],
	     'isadmin' => $row['isadmin']
      ));

      return $user;
    }

    return null;
  }

  public function putInLibrary($game_id){
    $query = DB::connection()->prepare('INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (:playerid, :gameid, 0, FALSE) RETURNING player_id');
    $query->execute(array('playerid' => $this->id, 'gameid' => $game_id));
    //$row = $query->fetch();
    //$this->id = $row['id'];
  }

  public function updateGame($game_id, $rating, $completed){
    $query = DB::connection()->prepare('UPDATE PlayerGame SET rating = :rating, completed = :completed WHERE player_id = :player_id AND game_id = :game_id');
    $query->execute(array('player_id' => $this->id, 'game_id' => $game_id, 'rating' => $rating, 'completed' => $completed));
    //$row = $query->fetch();
    //$this->id = $row['id'];
  }

  public function destroyGame($game_id){
    $query = DB::connection()->prepare('DELETE FROM PlayerGame WHERE player_id = :player_id AND game_id = :game_id');
    $query->execute(array('player_id' => $this->id, 'game_id' => $game_id));
    //$row = $query->fetch();
    //$this->id = $row['id'];
  }

}
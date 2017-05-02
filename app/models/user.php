<?php
class User extends BaseModel{
	public $id, $username, $password;

	public function __construct($attributes){
		parent::__construct($attributes);
    $this->validators = array('validate_username', 'validate_password');
	}

	public function authenticate($name, $pass) {
		$query = DB::connection()->prepare('SELECT * FROM Player WHERE username = :name AND password = :password LIMIT 1');
		$query->execute(array('name' => $name, 'password' => $pass));
		$row = $query->fetch();
		if($row){
			$user = new User(array(
	        'id' => $row['id'],
	        'username' => $row['username'],
	        'password' => $row['password']
	      	));

	      	return $user;
		}else{
			return null;
		}
	}

  public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM Player');
    $query->execute();
    $rows = $query->fetchAll();
    $games = array();

    foreach($rows as $row){
      $users[] = new User(array(
        'id' => $row['id'],
        'username' => $row['username'],
        'password' => $row['password']
      ));
    }

    return $users;
  }

	public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Player WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $user = new User(array(
        'id' => $row['id'],
        'username' => $row['username'],
        'password' => $row['password']
      ));

      return $user;
    }

    return null;
  }

  public static function findByUsername($username){
    $query = DB::connection()->prepare('SELECT * FROM Player WHERE username = :username LIMIT 1');
    $query->execute(array('username' => $username));
    $row = $query->fetch();

    if($row){
      $user = new User(array(
        'id' => $row['id'],
        'username' => $row['username'],
        'password' => $row['password']
      ));

      return $user;
    }

    return null;
  }

  public function save(){
    $query = DB::connection()->prepare('INSERT INTO Player (username, password) VALUES (:username, :password) RETURNING id');
    $query->execute(array('username' => $this->username, 'password' => $this->password));
  }

  public function updateUsername(){
    $query = DB::connection()->prepare('UPDATE Player SET username = :username WHERE id = :id');
    $query->execute(array('username' => $this->username, 'id' => $this->id));
  }

  public function updatePassword(){
    $query = DB::connection()->prepare('UPDATE Player SET password = :password WHERE id = :id');
    $query->execute(array('password' => $this->password, 'id' => $this->id));
  }

  public function destroy(){
    $query = DB::connection()->prepare('DELETE FROM Player WHERE id = :id');
    $query->execute(array('id' => $this->id));
  }

  public function putInLibrary($game_id){
    $query = DB::connection()->prepare('INSERT INTO PlayerGame (player_id, game_id, rating, completed) VALUES (:playerid, :gameid, 3, :completed) RETURNING player_id');
    $query->execute(array('playerid' => $this->id, 'gameid' => $game_id, 'completed' => 'Aloittamatta'));
  }

  public function updateGame($game_id, $rating, $completed){
    $query = DB::connection()->prepare('UPDATE PlayerGame SET rating = :rating, completed = :completed WHERE player_id = :player_id AND game_id = :game_id');
    $query->execute(array('player_id' => $this->id, 'game_id' => $game_id, 'rating' => $rating, 'completed' => $completed));
  }

  public function destroyGame($game_id){
    $query = DB::connection()->prepare('DELETE FROM PlayerGame WHERE player_id = :player_id AND game_id = :game_id');
    $query->execute(array('player_id' => $this->id, 'game_id' => $game_id));
  }

  public function validate_username(){
    $errors = array();
    $error = $this->validate_null($this->username);
    if (strlen($error) > 0) {
      $errors[] = 'Käyttäjällä on oltava nimi.';
    }
    return $errors;
  }

  public function validate_password(){
    $errors = array();
    $error = $this->validate_null($this->password);
    if (strlen($error) > 0) {
      $errors[] = 'Käyttäjällä on oltava salasana.';
    }
    return $errors;
  }

}
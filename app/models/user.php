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

}
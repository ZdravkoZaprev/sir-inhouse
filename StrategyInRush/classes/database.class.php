<?php 

/**
 * 
 */
class database
{
	private $server = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'strategyinrush';

	private $connection = '';

	function __construct()
	{
		$this->connect();
	}

	private function connect()
	{
		$this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->database);
	}

	public function close()
	{
		mysqli_close($this->connection);
		$this->connection = '';
	}


	//create user first time he login
	public function createUser($steam_id, $username)
	{
		if (empty($steam_id)) {
			return;
		}

		$sql = "INSERT INTO `users` (`steam_id`, `username`, `vouched`, `vouched_by`, `vouch_date`, `rank`, `comment`) 
					 		 VALUES ('$steam_id', '$username', '0', NULL, NULL, NULL, NULL)";
		$request = $this->connection->query($sql);

		return $request;
	}

	public function getAllUsers()
	{
		$sql = "SELECT steam_id, username FROM users";
		$request = $this->connection->query($sql);

		$result = array();
		if ($request->num_rows > 0) {
    		// output data of each row
	    while($row = $request->fetch_assoc()) {
		    	$result[$row['steam_id']] = $row['username'];
		    }
		} else {
		    return;
		}

		return $result;
	}

	public function getUserBySteamId($steam_id)
	{
		if (empty($steam_id)) {
			return;
		}

		$sql = "SELECT * FROM `users` WHERE steam_id = $steam_id";
		$request = $this->connection->query($sql);


		if ($request->num_rows > 0) {
	    	while($row = $request->fetch_assoc()) {
		    	$result = $row;
		    }
		} else {
		    return;
		}

		return $result;
	}


	public function updateUser()
	{

	}

	public function createVouchRequest($steam_id, $username)
	{
		if (empty($steam_id)) {
			return;
		}

		$current_time = date('Y-m-d H:i:s');

		$sql = "INSERT INTO `vouch_requests` (`steam_id`, `username`, `request_date`, `request_count`) 
		VALUES ('$steam_id', '$username', '$current_time', '1')"; // TODO: change requests_count

		$request = $this->connection->query($sql);

		return $request;
	}

	public function getAllVouchRequests()
	{
		$sql = "SELECT steam_id, username FROM vouch_requests";
		$request = $this->connection->query($sql);

		$result = array();
		if ($request->num_rows > 0) {
    		// output data of each row
	    while($row = $request->fetch_assoc()) {
		    	$result[$row['steam_id']] = $row['username'];
		    }
		} else {
		    return;
		}

		return $result;
	}

	public function getVouchRequestBySteamId($steam_id)
	{
		if (empty($steam_id)) {
			return;
		}

		$sql = "SELECT * FROM `vouch_requests` WHERE steam_id = $steam_id";
		$request = $this->connection->query($sql);

		if ($request->num_rows > 0) {
	    	while($row = $request->fetch_assoc()) {
		    	$result = $row;
		    }
		} else {
		    return;
		}

		return $result;
	}




}


?>
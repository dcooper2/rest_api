/* Database Connection framwork from http://webcheatsheet.com/php/connect_mysql_database.php and http://www.w3schools.com/php/php_mysql_connect.asp*/

<?php

$username = "";
$password = "";
$servername = "localhost";

//create connection
$connect = mysql_connect($servername, $username, $password);

//check connection
if (!$connect) {
	die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully\n";

//select Coral database
$db_connect = mysql_select_db("Coral", $connect);

//processing requests
$method = $_SERVER['REQUEST_METHOD'];
$paths = $_SERVER['REQUEST_URI'];
$resource = explode("/",$paths);

if ($resource == 'clients') {
	$name = array_shift($paths);

	if (empty($name)) {
		$this->handleMethod($method, $name);
	} else {
		$this->handleMethod($method, $name);
	}

}else {
	header('HTTP/1.1 404 Not Found');

}

if ($resource == 'corals') {
        $name = array_shift($paths);

        if (empty($name)) {
                $this->handleMethod($method, $name);
        } else {
                $this->handleMethod($method, $name);
        }

}else {
        header('HTTP/1.1 404 Not Found');

}

function handleMethod ($method, $name) {

	switch($method) {
	case 'PUT':
		$this->create_contact($name);
		$query_put = mysql_query("insert into corals values ($name)");
		while ($row = mysql_fetch_array($query_put)) {
			echo "name:".$row{'name'}." price:".$row{'price'}."\n";
		}
		break;
	case 'DELETE':
		$this->delete_contact($name);
		$query_delete = mysql_query("delete from corals values ($name, $price)");
		while ($row = mysql_fetch_array($query_delete)) {
			echo "name:".$row{'name'}." price:".$row{'price'}."\n";
		}
		break;
	case 'GET':
		$this->display_contact($name);
		$query_get = mysql_query("select name from corals where name=$name");
		echo $query_get;
		break;
	default:
		header('HTTP/1.1 405 Method Not Allowed');
		header('Allow: GET, PUT, DELETE');
		break;
	}

}




?>

<?php

session_start();

echo date('jS M, Y, H:i',time()).'<br/>';

$host = '166.62.8.13';

$name = 'testlearndo';

$pass = 'Person%45';

$dbname = 'testlearndo';

if(mysql_connect($host, $name, $pass)){

	echo 'connected to server<br/>';

	if(mysql_select_db($dbname)){

		echo 'connected to database<br/>';

	}

}

?>
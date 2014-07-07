<?php

require 'connect.php';
require 'checklogin.php';

$res = mysql_query("SELECT * FROM `tasks` ORDER BY taskid DESC");

include('disp-res-table.php');

?>
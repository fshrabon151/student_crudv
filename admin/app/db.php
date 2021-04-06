<?php

/**
 * Make a database connection
 */

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'miniecom';

/**
 * Conect function
 */
function connect()
{
  global $host, $user, $pass, $db;
  return $connection = new mysqli($host, $user, $pass, $db);
}

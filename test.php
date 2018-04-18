<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.inc.php';
use App\Database\DB as DB;

ini_set('display_errors','on');

$sql = 'insert into planets (name) values ("dagobah")';
$stmt = DB::run($sql);
$sql = "select * from planets";

//$stmt = DB::prepare($sql);
//$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();

var_dump($row);
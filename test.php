<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.inc.php';
use App\Database\DB as DB;

ini_set('display_errors','on');


//1. Insert planet dagobah and hoth
$sql = 'insert into planets (name, system, affiliation) values ("Dagobah", "Dagobah System", "Rebellion")';
$stmt = DB::run($sql);
echo "\n\n" . $sql;
$sql = 'insert into planets (name, system, affiliation) values ("Hoth", "Outer Rim", "Rebellion")';
$stmt = DB::run($sql);
echo "$sql" . "\n";

//2. Select * from planets
$sql = "select * from planets";
$stmt = DB::run($sql);
echo $sql . "\n";

$row = $stmt->fetchAll();

foreach($row as $rows)
{
    echo "| ";
    foreach($rows as $values){
        echo $values . " | ";
    }
    echo "\n";
}

//3. Select name from planets where affiliation is "Rebellion"
$sql = 'select name from planets where affiliation = "Rebellion"';
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
echo $sql . "\n";
foreach($row as $rows)
{
    echo "| ";
    foreach($rows as $values){
        echo $values . " | ";
    }
    echo "\n";
}

//3. update all planet affiliations to empire if rebellion
$sql = 'update planets set affiliation = "Empire" where affiliation = "Rebellion"';
echo $sql . "\n";
$stmt = DB::run($sql);

//3. Select name, system from planets where affiliation is "Empire"
$sql = 'select name, system from planets where affiliation = "Empire"';
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
echo $sql . "\n";
foreach($row as $rows)
{
    echo "| ";
    foreach($rows as $values){
        echo $values . " | ";
    }
    echo "\n";
}

//Create Alderaan
$sql = 'insert into planets (name, system, affiliation) values ("Alderaan", "Alderaan System", "Rebellion")';
echo $sql . "\n";
$stmt = DB::run($sql);

//Select * from planets where name = Alderaan
$sql = 'select * from planets where name = "Alderaan"';
$stmt = DB::run($sql);
echo $sql . "\n";

$row = $stmt->fetchAll();

foreach($row as $rows)
{
    echo "| ";
    foreach($rows as $values){
        echo $values . " | ";
    }
    echo "\n";
}


//4. Create and Destroy Alderaan
//Destroy Alderaan
$sql = 'delete from planets where name ="Alderaan"';
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
echo $sql . "\n";

//Confirm RIP Alderaan
$sql = 'select * from planets where name = "Alderaan"';
$stmt = DB::run($sql);
echo $sql . "\n";

$row = $stmt->fetchAll();

foreach($row as $rows)
{
    echo "| ";
    foreach($rows as $values){
        echo $values . " | ";
    }
    echo "\n";
}
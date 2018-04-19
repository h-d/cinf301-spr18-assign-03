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

//add planets *********
// add Corellia
$sql = 'insert into planets (name, system, affiliation) values ("Corellia", "Corellia", "New Republic")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Selenia", "Corellia", "New Republic")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Mandalore", "Mandalore", "Mandalore Protectors")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Killian", "Fuller", "Black Star Confederacy")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Kuat", "Kuat", "New Republic")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Coruscant", "Coruscant", "New Republic")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Jakku", "Jakku", "Independent")';
$stmt = DB::run($sql);
$sql = 'insert into planets (name, system, affiliation) values ("Tatooine", "Tatoo", "Hutt Clan")';
$stmt = DB::run($sql);
//planets done**********

//add manufacturers ******
//add kuat drive yards
$sql = 'insert into manufacturers (name, ceo, hq, affiliation) values ("Corellian Engineering Corp", "Corran Destt", "Corellia", "New Republic")';
$stmt = DB::run($sql);
//add corellian engineering systems
$sql = 'insert into manufacturers (name, ceo, hq, affiliation) values ("Kuat Drive Yards", "Kuat of Kuat", "Kuat", "Kuat Systems")';
$stmt = DB::run($sql);
//add ManalMotors
$sql = 'insert into manufacturers (name, ceo, hq, affiliation) values ("MandalMotors", "Karric Nayms", "Mandalore", "Mandalorian Protectors")';
$stmt = DB::run($sql);
//link manufacturers' planet_id to planets table using name field
$sql = 'update manufacturers 
          inner join planets 
            on (manufacturers.hq = planets.name) 
              set manufacturers.planet_id = planets.id';
$stmt = DB::run($sql);
// Manufacturers done ****

//add ships
//add YT-1300
$sql = 'insert into ships (model, manufacturer, ship_class, length, price, quantity, planet, hyperdrive_class) 
                  values ("YT-1300","Corellian Engineering Corp", "subcapital", 34.75, 100000, 72, "Corellia", 2)';
$stmt = DB::run($sql);
$sql = 'insert into ships (model, manufacturer, ship_class, length, price, quantity, planet, hyperdrive_class) 
                  values ("YT-2400","Corellian Engineering Corp", "small", 18.65, 130000, 31, "Selenia", 2)';
$stmt = DB::run($sql);
$sql = 'insert into ships (model, manufacturer, ship_class, length, price, quantity, planet, hyperdrive_class) 
                  values ("Star Destroyer","Kuat Drive Yards", "executor", 19000, 71000000000, 3, "Coruscant", 2)';
$stmt = DB::run($sql);
$sql = 'update ships 
          inner join planets 
            on (ships.planet = planets.name) 
              set ships.planet_id = planets.id';
$stmt = DB::run($sql);
$sql = 'update ships 
          inner join manufacturers 
            on (ships.manufacturer = manufacturers.name) 
              set ships.manufacturer_id = manufacturers.id';
$stmt = DB::run($sql);

//add stores
//Add Unkar's concession stand
$sql = 'insert into stores (name, location, planet, owner) 
          values ("Unkar Plutt\'s Concession Stand", "Niima Outpost", "Jakku", "Unkar Plutt")';
$stmt = DB::run($sql);
$sql = 'insert into stores (name, location, planet, owner) 
          values ("Wald\'s Parts", "Mos Espa", "Tatooine", "Wald")';
$stmt = DB::run($sql);
$sql = 'insert into stores (name, location, planet, owner) 
          values ("Shipwright Auxiliary Spaceport", "Blastfield Shipyards", "Corellia", "S-4V5")';
$stmt = DB::run($sql);
$sql = 'update stores 
          inner join planets 
            on (stores.planet = planets.name) 
              set stores.planet_id = planets.id';
$stmt = DB::run($sql);

//add sellers
$sql = 'insert into sellers (name, species, affiliation, alive) 
          values ("Unkar Plutt", "Crolute", "Independent", true)';
$stmt = DB::run($sql);
$sql = 'insert into sellers (name, species, affiliation, alive) 
          values ("Wald", "Rodian", "Independent", true)';
$stmt = DB::run($sql);
$sql = 'insert into sellers (name, species, affiliation, alive) 
          values ("Watto", "Toydarian", "Independent", false)';
$stmt = DB::run($sql);
$sql = 'insert into sellers (name, species, affiliation, alive) 
          values ("S-4V5", "Droid", "New Republic", false)';
$stmt = DB::run($sql);
//update sellers with their owned stores
$sql = 'update sellers
          inner join stores
            on (sellers.name = stores.owner)
              set sellers.store_id = stores.id';
$stmt = DB::run($sql);
//update stores with seller info
$sql = 'update stores
          inner join sellers
            on (stores.owner = sellers.name)
              set stores.seller_id = sellers.id';
$stmt = DB::run($sql);

//add orders
$sql = 'insert into orders (cost_total, shipping_method, order_status, customer) 
          values (260000, "economy", "shipped", "Dash Rendar")';
$stmt = DB::run($sql);
$sql = 'insert into orders (cost_total, shipping_method, order_status, customer) 
          values (100000, "overnight", "archived", "Lando Calrissian")';
$stmt = DB::run($sql);
$sql = 'insert into orders (cost_total, shipping_method, order_status, customer) 
          values (284000000000, "intergalactic economy", "delivered", "Bob Snoke")';
$stmt = DB::run($sql);

//add customers
$sql = 'insert into customers (name, species, affiliation, occupation, trust) 
          values ("Dash Rendar", "human", "independent", "smuggler", true)';
$stmt = DB::run($sql);
$sql = 'insert into customers (name, species, affiliation, occupation, trust) 
          values ("Lando Calrissian", "human", "independent", "administrator", false)';
$stmt = DB::run($sql);
$sql = 'insert into customers (name, species, affiliation, occupation, trust) 
          values ("Bob Snoke", "humanoid", "The New Order", "community organizer", true)';
$stmt = DB::run($sql);

//update orders with their customers
$sql = 'update orders
          inner join customers
            on (orders.customer = customers.name)
              set orders.customer_id = customers.id';
$stmt = DB::run($sql);


//add order_ships
$sql = 'insert into orders_ships (ship_name, customer, quantity) 
          values ("YT-2400", "Dash Rendar", 2)';
$stmt = DB::run($sql);
$sql = 'insert into orders_ships (ship_name, customer, quantity) 
          values ("YT-1300", "Lando Calrissian", 1)';
$stmt = DB::run($sql);
$sql = 'insert into orders_ships (ship_name, customer, quantity) 
          values ("Star Destroyer", "Bob Snoke", 4)';
$stmt = DB::run($sql);

//add cust id to orders
$sql = 'update orders
          inner join customers
            on (orders.customer = customers.name)
              set orders.customer_id = customers.id';
$stmt = DB::run($sql);

//add orders_ships to orders
$sql = 'update orders
          inner join orders_ships
            on (orders.customer = orders_ships.customer)
              set orders.orders_ships_id = orders_ships.order_id';
$stmt = DB::run($sql);

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
<?php
require __DIR__ . '/vendor/autoload.php';

// Setup
$pdo = new \PDO( 'sqlite:db/blog.sqlite3' );
$db = new \LessQL\Database( $pdo );

//$db->setAlias( 'author', 'user' );
$db->setPrimary( 'categorization', array( 'category_id', 'post_id' ) );

//Basic finding
$result = $db->user();
$row = $result->fetch();      // fetch next row in result
print "$row->id $row->name \n ";


$rows = $result->fetchAll();  // fetch all rows => array of rows
foreach($rows as $row) {
    print "$row->id $row->name \n";
    $max_id=$row->id;
}

// where
$result = $db->user();
$result2 = $result->where( 'name', 'Alice' );
$count=$result2->rowCount();
print "Alice count  $count \n"; 

// get a row directly by primary key
$row = $db->table('user', 1);
$row=$db->user($max_id+1);
//if (!$row->exists()) print "User id  Not Found \n";
if(is_null($row )) print "User id  Not found \n";


$row = $db->user()->where( 'name', 'Charlie' )->fetch();
if(!is_null($row)) {
    print "Deleting Charlie id $row->id \n";
    $row->delete();
}

$row = $db->user()->createRow();
$row->name='Charlie';
$row->save();
print "Inserting Charlie id $row->id \n";

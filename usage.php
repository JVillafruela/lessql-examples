<?php
require __DIR__ . '/vendor/autoload.php';

// Setup
$pdo = new \PDO( 'sqlite:db/blog.sqlite3' );
$db = new \LessQL\Database( $pdo );

//$db->setAlias( 'author', 'user' );
$db->setPrimary( 'categorization', array( 'category_id', 'post_id' ) );

$db->setQueryCallback( function( $query, $params ) {
        print "Query: $query \n";
    } );

//Finding and Traversal
foreach ( $db->post()
    ->orderBy( 'date_published', 'DESC' )
    ->where( 'is_published', 1 )
    ->paged( 10, 1 ) as $post ) {

    // Get author of post
    // Uses the pre-defined alias, gets from user where id is post.author_id
    $author = $post->user()->fetch();
 
    // Get category titles of post
    $categories = array();

    foreach ( $post->categorizationList()->category() as $category ) {
        $categories[] = $category[ 'title' ];
    }
    
    print "$post->id $post->title $post->date_published $author->name ". join(',', $categories)  ."\n";

}


<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/DataBaseCon.php';
include_once '../../models/user.php';

$database = new DataBaseCon();
$db = $database->connection();
$user = new user($db);

$get = isset($_GET['name']) ? $_GET['name'] : die();

$name = preg_replace('/[^-a-zA-Z0-9_]/', '', $get);
if(strlen($name)>50){
    echo json_encode(
        array('message' => 'Too Long Input')
    );
    die();
}
$user->name = $name ;
$result = $user->GetUserByName();
$num = $result->rowCount();

if($num > 0) {
    $posts_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'us_id' => $us_id,
            'name' => $name,
            'email' => $name
        );
        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }
    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No users Found')
    );
}
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/DataBaseCon.php';
include_once '../../models/Product.php';

$database = new DataBaseCon();
$db = $database->connection();
$Product = new Product($db);

$get = isset($_GET['name']) ? $_GET['name'] : die();
$name = strip_tags($get);
if(strlen($name)>70){
    echo json_encode(
        array('message' => 'Too Long Input')
    );
    die();
}
$Product->pro_name = $name ;
$result = $Product->GetPriceByName();
$num = $result->rowCount();

if($num > 0) {
    $posts_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $pro_id,
            'name' => $pro_name,
            'price' => $pro_price
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
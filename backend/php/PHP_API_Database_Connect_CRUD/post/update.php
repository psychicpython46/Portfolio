<?php
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); //not all needed
include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->Connect();

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

if ($post->Update()) {
    echo json_encode(array('message' => 'Post Updated'));
} else {
    echo json_encode(array('message' => 'Post NOT Updated'));
}
?>
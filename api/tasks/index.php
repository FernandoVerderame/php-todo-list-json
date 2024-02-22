<?php

$source_path = __DIR__ . '/../../database/tasks.json';

$json_data = file_get_contents($source_path);


$tasks = $json_data;

$new_task = $_POST['task'] ?? '';

if ($new_task) {

    $tasks = json_decode($tasks, true);

    $new_task = array(
        "id" => time(),
        "text" => $_POST['task'],
        "done" => false
    );

    $tasks[] = $new_task;

    $tasks = json_encode($tasks);
}


header ('Content-Type: application/json');

echo $tasks;

?>
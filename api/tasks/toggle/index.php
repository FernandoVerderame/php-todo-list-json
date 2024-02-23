<?php


header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Headers: X-Requested-With');


// JSON path
$source_path = __DIR__ . '/../../../database/tasks.json';

$json_data = file_get_contents($source_path);

// Our tasks
$tasks = $json_data;

// New task check
$task_id = $_POST['id'] ?? null;

if ($task_id) {

    $tasks = json_decode($tasks, true);

    // Updated tasks
    $tasks = array_map(function($task) {
        if ($task['id'] == $_POST['id']) $task['done'] = !$task['done'];
        return $task;
    }, $tasks);

    $tasks = json_encode($tasks);

    // Update JSON file
    file_put_contents($source_path, $tasks);
}


header ('Content-Type: application/json');

echo $tasks;

?>
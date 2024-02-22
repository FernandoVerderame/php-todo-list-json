<?php


header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Headers: X-Requested-With');


// JSON path
$source_path = __DIR__ . '/../../database/tasks.json';

$json_data = file_get_contents($source_path);

// Our tasks
$tasks = $json_data;

// New task check
$new_task = $_POST['task'] ?? '';

if ($new_task) {

    $tasks = json_decode($tasks, true);

    // New task creation
    $new_task = array(
        "id" => time(),
        "text" => $_POST['task'],
        "done" => false
    );

    // New task validation
    if (!in_array($new_task, $tasks)) {
        
        // Add new task
        $tasks[] = $new_task;

    } else {

        // Error message
        echo json_encode('{"error": "Si è verificato un errore"}');
    }


    $tasks = json_encode($tasks);

    // Update JSON file
    file_put_contents($source_path, $tasks);
}


header ('Content-Type: application/json');

echo $tasks;

?>
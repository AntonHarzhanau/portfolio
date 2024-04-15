<?php
require_once '../db/dbContacts.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$fields = ['name', 'email', 'message'];

$errors = [];

foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        $errors[$field] = 'Field is required.';
    } else {
        $_POST[$field] = sanitize_input($_POST[$field]);
    }
}

if (!isset($errors['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format.';
}

if (count($errors) > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Validation errors', 'errors' => $errors]);
    exit;
}

$db = new Database('contacts.sqlite');
echo json_encode(['status' => 'succses']);
// try {
//     $db->insertRecord($_POST['name'], $_POST['email'], $_POST['message']);
//     echo json_encode(['status' => 'success', 'message' => 'Record added successfully.']);
// } catch (Exception $e) {
//     echo json_encode(['status' => 'error', 'message' => 'Failed to add record.', 'error' => $e->getMessage()]);
// }
?>


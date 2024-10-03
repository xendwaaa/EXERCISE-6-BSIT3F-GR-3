<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    $errors = [];

    if (empty($firstname)) {
        $errors[] = 'First Name is required.';
    }

    if (empty($lastname)) {
        $errors[] = 'Last Name is required.';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid Email is required.';
    }

    if (empty($gender)) {
        $errors[] = 'Please select your gender.';
    }

    if (empty($message)) {
        $errors[] = 'Message is required.';
    }

    if (!empty($errors)) {
        echo json_encode(['status' => 'error', 'messages' => $errors]);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Your message has been successfully sent!']);
    }
}
?>

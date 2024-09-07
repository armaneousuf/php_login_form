<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $reservation_date = htmlspecialchars($_POST['reservation_date']);
    $reservation_time = htmlspecialchars($_POST['reservation_time']);
    $persons = filter_input(INPUT_POST, 'persons', FILTER_SANITIZE_NUMBER_INT);
    $notes = htmlspecialchars($_POST['notes']);

    $errors = [];
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    }
    if (empty($reservation_date)) {
        $errors['reservation_date'] = "Reservation date is required.";
    }
    if (empty($reservation_time)) {
        $errors['reservation_time'] = "Reservation time is required.";
    }
    if ($persons <= 0) {
        $errors['persons'] = "Number of persons must be at least 1.";
    }

    if (count($errors) == 0) {
        // No errors, proceed with storing or processing the reservation details
        echo "Reservation submitted successfully!<br>";
        echo "Name: $first_name $last_name<br>";
        echo "Email: $email<br>";
        echo "Phone: $phone<br>";
        echo "Date: $reservation_date at $reservation_time<br>";
        echo "Number of persons: $persons<br>";
        echo "Notes: $notes<br>";
    } else {
  
        foreach ($errors as $field => $error) {
            echo "Error in $field: $error<br>";
        }
    }
} else {
    echo "Form not submitted";
}
?>

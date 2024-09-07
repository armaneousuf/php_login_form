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
}
<!DOCTYPE HTML>  
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      padding: 20px;
      border-radius: 8px;
      width: 100%;
      max-width: 500px;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form h2 {
      color: #333;
      text-align: center;
    }

    .input-group {
      margin-bottom: 15px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="time"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 2px solid #ccc;
      border-radius: 4px;
      resize: none;
    }

    textarea {
      grid-column: span 2;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #6865ea;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background: #3F51B5;
      cursor: pointer;
    }

  </style>
</head>
<body>  
<?php
$first_name = $last_name = $email = $phone = $reservation_date = $reservation_time = $persons = $notes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = test_input($_POST["first_name"]);
  $last_name = test_input($_POST["last_name"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $reservation_date = test_input($_POST["reservation_date"]);
  $reservation_time = test_input($_POST["reservation_time"]);
  $persons = test_input($_POST["persons"]);
  $notes = test_input($_POST["notes"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="form-container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h2>Restaurant Reservation Form</h2>
      <div class="input-group">
          <input type="text" name="first_name" placeholder="First Name" required>
          <input type="text" name="last_name" placeholder="Last Name" required>
      </div>
      <div class="input-group">
          <input type="email" name="email" placeholder="Email" required>
          <input type="tel" name="phone" placeholder="### ### ####">
      </div>
      <div class="input-group">
          <input type="date" name="reservation_date" required>
          <input type="time" name="reservation_time" required>
      </div>
      <div class="input-group">
          <input type="number" name="persons" placeholder="How many persons will you be with?" min="1" required>
      </div>
      <textarea name="notes" placeholder="Notes" rows="4"></textarea>
      <button type="submit">SEND</button>
  </form>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Your Input:</h2>";
    echo "First Name: " . $first_name . "<br>";
    echo "Last Name: " . $last_name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Reservation Date: " . $reservation_date . "<br>";
    echo "Reservation Time: " . $reservation_time . "<br>";
    echo "Persons: " . $persons . "<br>";
    echo "Notes: " . $notes . "<br>";
  }
  ?>
</div>

</body>
</html>

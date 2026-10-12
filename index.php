<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    
    $host = 'localhost';
    $user = 'root';
    $pass = ''; 
    $dbname = 'data';
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try {
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        $stmt = $conn->prepare("INSERT INTO details (name, address, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $address, $email);
        $stmt->execute();
        
        $message = "<div class='alert success'>Data saved successfully!</div>";
        
        $stmt->close();
        mysqli_close($conn);
    } catch (mysqli_sql_exception $e) {
        $message = "<div class='alert error'>An error occurred while saving the data.</div>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Link to external JavaScript -->
    <script src="script.js" defer></script>
</head>
<body>

<div class="form-container">
    <h2>User Registration</h2>
    
    <?php if (isset($message)) echo $message; ?>

    <form action="" method="POST" id="userForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="button-group">
            <input type="submit" name="submit" value="Save Data" class="btn-submit">
            <input type="reset" value="Reset" class="btn-reset">
        </div>
    </form>
</div>

</body>
</html>
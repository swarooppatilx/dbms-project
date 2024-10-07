<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">User Registration</h2>
    <form method="post" action="" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone number" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    $phone = $_POST['phone'];

    $sql = "INSERT INTO Users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container mt-3 alert alert-success'>User registered successfully!</div>";
    } else {
        echo "<div class='container mt-3 alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$conn->close(); // Close the database connection
?>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

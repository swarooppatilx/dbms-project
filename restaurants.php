<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Restaurant</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Add Restaurant</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Restaurant Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Restaurant Name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Restaurant</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO Restaurants (name, address, phone) VALUES ('$name', '$address', '$phone')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Restaurant added successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

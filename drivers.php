<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Add Driver</h2>

    <form method="post" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Driver Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Driver Name" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" placeholder="Location" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Driver</button>
    </form>

    <?php
    include('db.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $email = $_POST['email'];

        $sql = "INSERT INTO Drivers (name, phone, location, email) VALUES ('$name', '$phone', '$location', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3' role='alert'>Driver added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error: " . $conn->error . "</div>";
        }
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

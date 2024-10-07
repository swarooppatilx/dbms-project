<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Add Address</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" name="user_id" class="form-control" id="user_id" placeholder="User ID" required>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Street</label>
            <input type="text" name="street" class="form-control" id="street" placeholder="Street" required>
        </div>
        <div class="mb-3">
            <label for="pincode" class="form-label">Pincode</label>
            <input type="number" name="pincode" class="form-control" id="pincode" placeholder="Pincode" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Address</button>
    </form>

    <?php
    include('db.php');

    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];

        $sql = "INSERT INTO Address (user_id, state, city, street, pincode) VALUES ('$user_id', '$state', '$city', '$street', '$pincode')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Address added successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    ?>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

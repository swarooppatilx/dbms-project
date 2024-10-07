<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Rating</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Submit Rating</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" name="user_id" class="form-control" id="user_id" placeholder="User ID" required>
        </div>
        <div class="mb-3">
            <label for="restaurant_id" class="form-label">Restaurant ID</label>
            <input type="number" name="restaurant_id" class="form-control" id="restaurant_id" placeholder="Restaurant ID" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <input type="number" name="rating" class="form-control" id="rating" min="1" max="5" placeholder="Rating (1-5)" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit Rating</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $restaurant_id = $_POST['restaurant_id'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO Rating (user_id, restaurant_id, rating) VALUES ('$user_id', '$restaurant_id', '$rating')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Rating submitted successfully</div>";
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

<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Place Order</h2>
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
            <label for="order_total" class="form-label">Order Total</label>
            <input type="text" name="order_total" class="form-control" id="order_total" placeholder="Order Total" required>
        </div>
        <div class="mb-3">
            <label for="delivery_status" class="form-label">Delivery Status</label>
            <input type="text" name="delivery_status" class="form-control" id="delivery_status" placeholder="Delivery Status" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Place Order</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $restaurant_id = $_POST['restaurant_id'];
        $order_total = $_POST['order_total'];
        $delivery_status = $_POST['delivery_status'];

        $sql = "INSERT INTO Orders (user_id, restaurant_id, order_total, delivery_status) VALUES ('$user_id', '$restaurant_id', '$order_total', '$delivery_status')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Order placed successfully</div>";
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

<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Add Menu Item</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="restaurant_id" class="form-label">Restaurant ID</label>
            <input type="number" name="restaurant_id" class="form-control" id="restaurant_id" placeholder="Restaurant ID" required>
        </div>
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Item Name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Price" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Menu Item</button>
        <a href="show_menu.php" class="btn btn-secondary">Show Menu</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $restaurant_id = $_POST['restaurant_id'];
        $item_name = $_POST['item_name'];
        $price = $_POST['price'];

        $sql = "INSERT INTO Menu (restaurant_id, item_name, price) VALUES ('$restaurant_id', '$item_name', '$price')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Menu item added successfully</div>";
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

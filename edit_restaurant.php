<?php
include('db.php');

// Check if restaurant_id is set
if (isset($_GET['restaurant_id'])) {
    $restaurant_id = $_GET['restaurant_id'];

    // Check if the delete parameter is set
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        // Delete the restaurant record
        $sql = "DELETE FROM Restaurants WHERE restaurant_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $restaurant_id);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Restaurant deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting restaurant.</div>";
        }

        $stmt->close();
    } else {
        // If the delete is not set, handle the edit form
        // Fetch restaurant details to display in the form
        $sql = "SELECT * FROM Restaurants WHERE restaurant_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $restaurant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $restaurant = $result->fetch_assoc();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update the restaurant record with the form data
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            // Update the restaurant in the database
            $update_sql = "UPDATE Restaurants SET name = ?, address = ?, phone = ? WHERE restaurant_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("sssi", $name, $address, $phone, $restaurant_id);

            if ($update_stmt->execute()) {
                echo "<div class='alert alert-success'>Restaurant updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating restaurant.</div>";
            }

            $update_stmt->close();
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Restaurant</h2>

    <?php if (!isset($_GET['delete'])): ?>
        <!-- Edit Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($restaurant['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($restaurant['address']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($restaurant['phone']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Restaurant</button>
            <a href="show_restaurant.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('db.php');

// Check if the 'id' parameter is present
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Handle delete action
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        $delete_sql = "DELETE FROM Orders WHERE order_id = $order_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>alert('Order deleted successfully'); window.location.href='orders.php';</script>";
        } else {
            echo "<script>alert('Error deleting order: " . $conn->error . "'); window.location.href='orders.php';</script>";
        }
    }

    // Handle edit action (fetch order details)
    $sql = "SELECT * FROM Orders WHERE order_id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "<script>alert('Order not found'); window.location.href='orders.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='orders.php';</script>";
    exit;
}

// Handle form submission for editing
if (isset($_POST['submit'])) {
    $order_total = $_POST['order_total'];
    $delivery_status = $_POST['delivery_status'];

    $update_sql = "UPDATE Orders SET order_total = '$order_total', delivery_status = '$delivery_status' WHERE order_id = $order_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Order updated successfully'); window.location.href='orders.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating order: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Order</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="order_total" class="form-label">Order Total</label>
            <input type="number" step="0.01" name="order_total" class="form-control" id="order_total" value="<?php echo htmlspecialchars($order['order_total']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="delivery_status" class="form-label">Delivery Status</label>
            <select name="delivery_status" class="form-control" id="delivery_status" required>
                <option value="Pending" <?php if($order['delivery_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Delivered" <?php if($order['delivery_status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                <option value="Canceled" <?php if($order['delivery_status'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update Order</button>
        <a href="show_orders.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

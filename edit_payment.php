<?php
include('db.php');

// Check if payment_id is set
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // Check if the delete parameter is set
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        // Delete the payment record
        $sql = "DELETE FROM Payment WHERE payment_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $payment_id);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Payment deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting payment.</div>";
        }

        $stmt->close();
    } else {
        // If the delete is not set, handle the edit form
        // Fetch payment details to display in form
        $sql = "SELECT payment_method, amount, status FROM Payment WHERE payment_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $payment = $result->fetch_assoc();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update the payment record with the form data
            $payment_method = $_POST['payment_method'];
            $amount = $_POST['amount'];
            $status = $_POST['status'];

            // Update the payment in the database
            $update_sql = "UPDATE Payment SET payment_method = ?, amount = ?, status = ? WHERE payment_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("sdsi", $payment_method, $amount, $status, $payment_id);

            if ($update_stmt->execute()) {
                echo "<div class='alert alert-success'>Payment updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating payment.</div>";
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
    <h2 class="text-center">Edit Payment</h2>

    <?php if (!isset($_GET['delete'])): ?>
        <!-- Edit Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="payment_method" name="payment_method" value="<?php echo htmlspecialchars($payment['payment_method']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo number_format($payment['amount'], 2); ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo htmlspecialchars($payment['status']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Payment</button>
            <a href="show_payments.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

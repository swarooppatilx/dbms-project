<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Record Payment</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="order_id" class="form-label">Order ID</label>
            <input type="number" name="order_id" class="form-control" id="order_id" placeholder="Order ID" required>
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" id="payment_method" placeholder="Payment Method" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" id="amount" placeholder="Amount" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Payment Status</label>
            <input type="text" name="status" class="form-control" id="status" placeholder="Payment Status" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Record Payment</button>
        <a href="show_payments.php" class="btn btn-secondary">Show Payments</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $order_id = $_POST['order_id'];
        $payment_method = $_POST['payment_method'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];

        $sql = "INSERT INTO Payment (order_id, payment_method, amount, status) VALUES ('$order_id', '$payment_method', '$amount', '$status')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Payment recorded successfully</div>";
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

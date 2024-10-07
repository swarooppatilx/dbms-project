<?php include('db.php'); 

$sql = "
    SELECT 
        Payment.payment_id, 
        Payment.payment_method, 
        Payment.amount, 
        Payment.status, 
        Orders.order_id, 
        Users.name AS user_name, 
        Restaurants.name AS restaurant_name
    FROM Payment
    JOIN Orders ON Payment.order_id = Orders.order_id
    JOIN Users ON Orders.user_id = Users.user_id
    JOIN Restaurants ON Orders.restaurant_id = Restaurants.restaurant_id
";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Payments</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Payment ID</th>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Restaurant Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each payment
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['payment_id'] . "</td>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . htmlspecialchars($row['user_name']) . "</td>
                    <td>" . htmlspecialchars($row['restaurant_name']) . "</td>
                    <td>" . htmlspecialchars($row['payment_method']) . "</td>
                    <td>" . number_format($row['amount'], 2) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                    <td>
                        <a href='edit_payment.php?payment_id=" . $row['payment_id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='edit_payment.php?payment_id=" . $row['payment_id'] . "&delete=1' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table><a href='index.php' class='btn btn-secondary'>Back</a>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No payments found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

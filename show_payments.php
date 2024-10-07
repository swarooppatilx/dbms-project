<?php include('db.php'); 

$sql = "
    SELECT Payment.payment_id, Payment.payment_method, Payment.amount, Payment.status, Orders.order_id, Orders.user_id, Orders.restaurant_id 
    FROM Payment
    JOIN Orders ON Payment.order_id = Orders.order_id
";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
                    <th>User ID</th>
                    <th>Restaurant ID</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each payment
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['payment_id'] . "</td>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['restaurant_id'] . "</td>
                    <td>" . htmlspecialchars($row['payment_method']) . "</td>
                    <td>" . number_format($row['amount'], 2) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
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

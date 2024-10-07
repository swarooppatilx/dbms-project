<?php include('db.php');

$sql = "
    SELECT Menu.menu_id, Menu.item_name, Menu.price, Restaurants.name AS restaurant_name 
    FROM Menu
    JOIN Restaurants ON Menu.restaurant_id = Restaurants.restaurant_id
";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Menu Items</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Menu ID</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Restaurant Name</th>
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each menu item
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['menu_id'] . "</td>
                    <td>" . $row['item_name'] . "</td>
                    <td>" . number_format($row['price'], 2) . "</td>
                    <td>" . $row['restaurant_name'] . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No menu items found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

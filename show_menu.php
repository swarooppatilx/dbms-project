<?php include('db.php');

// SQL query to fetch menu items along with restaurant names
$sql = "
    SELECT Menu.menu_id, Menu.item_name, Menu.price, Restaurants.name AS restaurant_name 
    FROM Menu
    JOIN Restaurants ON Menu.restaurant_id = Restaurants.restaurant_id
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
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
                    <th>Actions</th> <!-- New Actions column for Edit and Delete buttons -->
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each menu item
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['menu_id']) . "</td>
                    <td>" . htmlspecialchars($row['item_name']) . "</td>
                    <td>" . number_format($row['price'], 2) . "</td>
                    <td>" . htmlspecialchars($row['restaurant_name']) . "</td>
                    <td>
                        <a href='edit_menu_item.php?id=" . htmlspecialchars($row['menu_id']) . "' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='edit_menu_item.php?id=" . htmlspecialchars($row['menu_id']) . "&delete=1' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
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

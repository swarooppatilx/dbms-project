<?php include('db.php'); 

$sql = "SELECT * FROM Restaurants";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Restaurants List</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Restaurant ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each restaurant
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['restaurant_id'] . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td>
                        <a href='edit_restaurant.php?restaurant_id=" . $row['restaurant_id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='edit_restaurant.php?restaurant_id=" . $row['restaurant_id'] . "&delete=1' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table><a href='index.php' class='btn btn-secondary'>Back</a>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No restaurants found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

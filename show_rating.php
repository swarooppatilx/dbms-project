<?php include('db.php'); 

$sql = "
    SELECT Rating.rating_id, Users.name AS user_name, Restaurants.name AS restaurant_name, Rating.rating 
    FROM Rating
    JOIN Users ON Rating.user_id = Users.user_id
    JOIN Restaurants ON Rating.restaurant_id = Restaurants.restaurant_id
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Restaurant Ratings</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Rating ID</th>
                    <th>User Name</th>
                    <th>Restaurant Name</th>
                    <th>Rating</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>";
        
        // Output data for each rating
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['rating_id'] . "</td>
                    <td>" . htmlspecialchars($row['user_name']) . "</td>
                    <td>" . htmlspecialchars($row['restaurant_name']) . "</td>
                    <td>" . $row['rating'] . "/5</td>
                    <td>
                        <a href='edit_rating.php?rating_id=" . $row['rating_id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='edit_rating.php?rating_id=" . $row['rating_id'] . "&delete=1' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table><a href='index.php' class='btn btn-secondary'>Back</a>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No ratings found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

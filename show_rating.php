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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
                  </tr>";
        }
        echo "</tbody></table>";
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

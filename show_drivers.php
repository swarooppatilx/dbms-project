<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Drivers</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">List of Drivers</h2>

    <?php
    include('db.php');

    $sql = "SELECT driver_id, name, phone, location, email FROM Drivers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'>
                <thead>
                    <tr>
                      <th>Driver ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Email</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Output data for each driver
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['driver_id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['email'] . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No drivers found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

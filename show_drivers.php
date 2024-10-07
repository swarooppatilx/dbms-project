<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
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
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Output data for each driver
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['driver_id'] . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td>" . htmlspecialchars($row['location']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>
                        <a href='edit_driver.php?id=" . $row['driver_id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='edit_driver.php?id=" . $row['driver_id'] . "&delete=1' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this driver?');\">Delete</a>
                    </td>
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

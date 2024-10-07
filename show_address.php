<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">List of Addresses</h2>

    <?php
    include('db.php');

    $sql = "SELECT * FROM Address";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>Address ID</th>
                        <th>User ID</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Pincode</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['address_id'] . "</td>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['state'] . "</td>
                    <td>" . $row['city'] . "</td>
                    <td>" . $row['street'] . "</td>
                    <td>" . $row['pincode'] . "</td>
                  </tr>";
        }
        echo "</tbody>
            </table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No addresses found.</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

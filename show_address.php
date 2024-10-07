<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">List of Addresses</h2>

    <?php
    include('db.php');

    // Updated SQL query to join Users table
    $sql = "
        SELECT 
            Address.address_id, 
            Users.name AS user_name, 
            Address.state, 
            Address.city, 
            Address.street, 
            Address.pincode
        FROM Address
        JOIN Users ON Address.user_id = Users.user_id
    ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Pincode</th>
                        <th>Actions</th> <!-- New Actions column -->
                    </tr>
                </thead>
                <tbody>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['user_name']) . "</td>
                    <td>" . htmlspecialchars($row['state']) . "</td>
                    <td>" . htmlspecialchars($row['city']) . "</td>
                    <td>" . htmlspecialchars($row['street']) . "</td>
                    <td>" . htmlspecialchars($row['pincode']) . "</td>
                    <td>
                        <a href='edit_address.php?address_id=" . $row['address_id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='?address_id=" . $row['address_id'] . "&delete=1' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</tbody>
            </table>
            <a href='index.php' class='btn btn-secondary'>Back</a>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No addresses found.</div>";
    }

    // Handle delete request
    if (isset($_GET['delete']) && $_GET['delete'] == 1 && isset($_GET['address_id'])) {
        $address_id = intval($_GET['address_id']);
        $delete_sql = "DELETE FROM Address WHERE address_id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $address_id);
        $stmt->execute();
        $stmt->close();
        // Redirect after delete
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

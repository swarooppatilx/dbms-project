<?php
include('db.php');

// Check if the 'id' parameter is present
if (isset($_GET['id'])) {
    $driver_id = $_GET['id'];

    // Handle delete action
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        $delete_sql = "DELETE FROM Drivers WHERE driver_id = $driver_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>alert('Driver deleted successfully'); window.location.href='show_drivers.php';</script>";
        } else {
            echo "<script>alert('Error deleting driver: " . $conn->error . "'); window.location.href='show_drivers.php';</script>";
        }
    }

    // Handle edit action (fetch driver details)
    $sql = "SELECT * FROM Drivers WHERE driver_id = $driver_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $driver = $result->fetch_assoc();
    } else {
        echo "<script>alert('Driver not found'); window.location.href='show_drivers.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='show_drivers.php';</script>";
    exit;
}

// Handle form submission for editing
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $email = $_POST['email'];

    $update_sql = "UPDATE Drivers SET name = '$name', phone = '$phone', location = '$location', email = '$email' WHERE driver_id = $driver_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Driver updated successfully'); window.location.href='show_drivers.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating driver: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Driver</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars($driver['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo htmlspecialchars($driver['phone']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" value="<?php echo htmlspecialchars($driver['location']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($driver['email']); ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update Driver</button>
        <a href="show_drivers.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

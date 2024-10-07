<?php
include('db.php');

// Check if user ID is set
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Handle delete request
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        $sql = "DELETE FROM Users WHERE user_id = $user_id";
        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully.";
            header("Location: show_users.php");
            exit;
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    }

    // Handle form submission for updating user details
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);

        $sql = "UPDATE Users SET name = '$name', email = '$email', phone = '$phone' WHERE user_id = $user_id";
        if ($conn->query($sql) === TRUE) {
            echo "User updated successfully.";
            header("Location: show_users.php");
            exit;
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }

    // Fetch user data for editing
    $sql = "SELECT * FROM Users WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>
<div class="container mt-5">
    <h2>Edit User</h2>
    <form action="edit_user.php?id=<?php echo $user_id; ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="show_users.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

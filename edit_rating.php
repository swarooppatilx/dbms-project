<?php
include('db.php');

// Check if rating_id is set
if (isset($_GET['rating_id'])) {
    $rating_id = $_GET['rating_id'];

    // Check if the delete parameter is set
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        // Delete the rating record
        $sql = "DELETE FROM Rating WHERE rating_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $rating_id);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Rating deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting rating.</div>";
        }

        $stmt->close();
    } else {
        // If the delete is not set, handle the edit form
        // Fetch rating details to display in form
        $sql = "SELECT rating FROM Rating WHERE rating_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $rating_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rating = $result->fetch_assoc();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update the rating record with the form data
            $new_rating = $_POST['rating'];

            // Update the rating in the database
            $update_sql = "UPDATE Rating SET rating = ? WHERE rating_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ii", $new_rating, $rating_id);

            if ($update_stmt->execute()) {
                echo "<div class='alert alert-success'>Rating updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating rating.</div>";
            }

            $update_stmt->close();
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Rating</h2>

    <?php if (!isset($_GET['delete'])): ?>
        <!-- Edit Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating (Out of 5)</label>
                <input type="number" step="1" min="1" max="5" class="form-control" id="rating" name="rating" value="<?php echo $rating['rating']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Rating</button>
            <a href="show_rating.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

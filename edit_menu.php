<?php
include('db.php');

// Check if menu item ID is set
if (isset($_GET['id'])) {
    $menu_id = intval($_GET['id']);

    // Handle delete request
    if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        $sql = "DELETE FROM Menu WHERE menu_id = $menu_id";
        if ($conn->query($sql) === TRUE) {
            echo "Menu item deleted successfully.";
            header("Location: show_menu.php");
            exit;
        } else {
            echo "Error deleting menu item: " . $conn->error;
        }
    }

    // Handle form submission for updating menu item details
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_name = $conn->real_escape_string($_POST['item_name']);
        $price = $conn->real_escape_string($_POST['price']);

        // Fetch the restaurant_id from the URL
        if (isset($_GET['restaurant_id'])) {
            $restaurant_id = intval($_GET['restaurant_id']);
        } else {
            echo "Restaurant ID not provided.";
            exit;
        }

        $sql = "UPDATE Menu SET restaurant_id = '$restaurant_id', item_name = '$item_name', price = '$price' WHERE menu_id = $menu_id";
        if ($conn->query($sql) === TRUE) {
            echo "Menu item updated successfully.";
            header("Location: show_menu.php");
            exit;
        } else {
            echo "Error updating menu item: " . $conn->error;
        }
    }

    // Fetch menu item data for editing
    $sql = "SELECT * FROM Menu WHERE menu_id = $menu_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $menu_item = $result->fetch_assoc();
    } else {
        echo "Menu item not found.";
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
    <h2>Edit Menu Item</h2>
    <!-- Form for editing menu item details -->
    <form action="edit_menu.php?id=<?php echo $menu_id; ?>&restaurant_id=<?php echo intval($_GET['restaurant_id']); ?>" method="POST">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo htmlspecialchars($menu_item['item_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($menu_item['price']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="show_menu.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

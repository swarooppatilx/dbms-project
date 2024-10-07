<?php
include('db.php');

// Check if address_id is set
if (isset($_GET['address_id'])) {
    $address_id = intval($_GET['address_id']);
    
    // Fetch existing address data
    $sql = "SELECT * FROM Address WHERE address_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $address_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $address = $result->fetch_assoc();
    
    // If no address found, redirect or show an error
    if (!$address) {
        header("Location: show_address.php");
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $state = $_POST['state'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $pincode = $_POST['pincode'];

    // Update address in the database
    $update_sql = "UPDATE Address SET state = ?, city = ?, street = ?, pincode = ? WHERE address_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssi", $state, $city, $street, $pincode, $address_id);
    $stmt->execute();

    // Redirect back to the list
    header("Location: show_address.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Address</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state" value="<?php echo htmlspecialchars($address['state']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($address['city']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Street</label>
            <input type="text" class="form-control" id="street" name="street" value="<?php echo htmlspecialchars($address['street']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="pincode" class="form-label">Pincode</label>
            <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo htmlspecialchars($address['pincode']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Address</button>
        <a href="show_address.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

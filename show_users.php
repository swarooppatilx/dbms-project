<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h2 class="text-center">Users List</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Actions</th> <!-- New column for actions -->
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM Users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["user_id"]) . "</td>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                    <td>
                      <a href='edit_user.php?id=" . htmlspecialchars($row["user_id"]) . "' class='btn btn-primary btn-sm'>Edit</a>
                      <a href='edit_user.php?id=" . htmlspecialchars($row["user_id"]) . "&delete=1' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <a href='index.php' class='btn btn-secondary'>Back</a>
</div>

<!-- Bootstrap JS (optional for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

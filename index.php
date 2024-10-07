<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Dashboard</h1>
    
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <ul class="list-group shadow">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="users.php" class="link-dark text-decoration-none"><i class="fas fa-user-plus me-2"></i> Add Users</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_users.php" class="link-dark text-decoration-none"><i class="fas fa-users me-2"></i> Show Users</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="restaurants.php" class="link-dark text-decoration-none"><i class="fas fa-store-alt me-2"></i> Add Restaurants</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_restaurants.php" class="link-dark text-decoration-none"><i class="fas fa-utensils me-2"></i> Show Restaurants</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="orders.php" class="link-dark text-decoration-none"><i class="fas fa-shopping-cart me-2"></i> Add Orders</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_orders.php" class="link-dark text-decoration-none"><i class="fas fa-receipt me-2"></i> Show Orders</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="drivers.php" class="link-dark text-decoration-none"><i class="fas fa-car me-2"></i> Add Drivers</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_drivers.php" class="link-dark text-decoration-none"><i class="fas fa-id-badge me-2"></i> Show Drivers</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="payment.php" class="link-dark text-decoration-none"><i class="fas fa-credit-card me-2"></i> Add Payments</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_payments.php" class="link-dark text-decoration-none"><i class="fas fa-money-bill-wave me-2"></i> Show Payments</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="rating.php" class="link-dark text-decoration-none"><i class="fas fa-star me-2"></i> Add Ratings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_rating.php" class="link-dark text-decoration-none"><i class="fas fa-star-half-alt me-2"></i> Show Ratings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="address.php" class="link-dark text-decoration-none"><i class="fas fa-map-marker-alt me-2"></i> Add Address</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_address.php" class="link-dark text-decoration-none"><i class="fas fa-address-card me-2"></i> Show Address</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="menu.php" class="link-dark text-decoration-none"><i class="fas fa-book me-2"></i> Add Menu</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="show_menu.php" class="link-dark text-decoration-none"><i class="fas fa-list-alt me-2"></i> Show Menu</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

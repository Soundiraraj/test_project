<?php include 'templates/header.php'; ?>

<div class="container">
    <h1>Admin Dashboard</h1>
    <form id="route-form">
        <div class="form-group">
            <label for="route-name">Route Name</label>
            <input type="text" class="form-control" id="route-name" name="route_name">
        </div>
        <button type="button" class="btn btn-primary" onclick="addRoute()">Add Route</button>
    </form>
    <form id="order-form">
        <div class="form-group">
            <label for="person-id">Person ID</label>
            <input type="number" class="form-control" id="person-id" name="person_id">
        </div>
        <div class="form-group">
            <label for="route-id">Route ID</label>
            <input type="number" class="form-control" id="route-id" name="route_id">
        </div>
        <div class="form-group">
            <label for="address">Order Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <button type="button" class="btn btn-primary" onclick="assignOrder()">Assign Order</button>
    </form>
</div>

<script>
function addRoute() {
    const routeName = $('#route-name').val();
    $.ajax({
        url: 'api/add_route.php',
        method: 'POST',
        data: { route_name: routeName },
        success: function(response) {
            alert('Route added successfully');
        }
    });
}

function assignOrder() {
    const personId = $('#person-id').val();
    const routeId = $('#route-id').val();
    const address = $('#address').val();
    $.ajax({
        url: 'api/assign_order.php',
        method: 'POST',
        data: { person_id: personId, route_id: routeId, address: address },
        success: function(response) {
            alert('Order assigned successfully');
        }
    });
}
</script>

<?php include 'templates/footer.php'; ?>

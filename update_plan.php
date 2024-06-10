<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "UPDATE Plan SET name='$name', description='$description', price='$price', status='$status', lastUpdate=NOW() WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Plan updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!-- Formulario en HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Plan</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Plan</h3>
            </div>
            <form method="post" action="update_plan.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">Plan ID</label>
                  <input type="number" class="form-control" name="id" required>
                </div>
                <div class="form-group">
                  <label for="name">Plan Name</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="number" class="form-control" name="status" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Plan</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

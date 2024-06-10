<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO Plan (name, description, price, status, registerDate) VALUES ('$name', '$description', '$price', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New plan created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
  <title>Create Plan</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Plan</h3>
            </div>
            <form method="post" action="create_plan.php">
              <div class="card-body">
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
                <button type="submit" class="btn btn-primary">Create Plan</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

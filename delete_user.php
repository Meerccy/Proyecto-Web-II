<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Userr WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
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
  <title>Delete User</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Delete User</h3>
            </div>
            <form method="post" action="delete_user.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">User ID</label>
                  <input type="number" class="form-control" name="id" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-danger">Delete User</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

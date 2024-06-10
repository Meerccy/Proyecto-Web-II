<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $names = $_POST['names'];
    $surname = $_POST['surname'];
    $secondSurname = $_POST['secondSurname'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $sql = "UPDATE Userr SET username='$username', role='$role', names='$names', surname='$surname', secondSurname='$secondSurname', email='$email', status='$status', lastUpdate=NOW() WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
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
  <title>Update User</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update User</h3>
            </div>
            <form method="post" action="update_user.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="id">User ID</label>
                  <input type="number" class="form-control" name="id" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="text" class="form-control" name="role" required>
                </div>
                <div class="form-group">
                  <label for="names">Names</label>
                  <input type="text" class="form-control" name="names" required>
                </div>
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" name="surname" required>
                </div>
                <div class="form-group">
                  <label for="secondSurname">Second Surname</label>
                  <input type="text" class="form-control" name="secondSurname">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="number" class="form-control" name="status" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update User</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

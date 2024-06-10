<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $names = $_POST['names'];
    $surname = $_POST['surname'];
    $secondSurname = $_POST['secondSurname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Userr (username, password, role, names, surname, secondSurname, status, registerDate, email) 
            VALUES ('$username', '$password', '$role', '$names', '$surname', '$secondSurname', 1, NOW(), '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
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
  <title>Create User</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New User</h3>
            </div>
            <form method="post" action="create_user.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" required>
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
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create User</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

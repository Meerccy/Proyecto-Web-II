<?php
include 'db_connection.php';
$sql = "SELECT * FROM Userr";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User List</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Names</th>
                    <th>Surname</th>
                    <th>Second Surname</th>
                    <th>Email</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>" . $row["id"]. "</td>
                                  <td>" . $row["username"]. "</td>
                                  <td>" . $row["role"]. "</td>
                                  <td>" . $row["names"]. "</td>
                                  <td>" . $row["surname"]. "</td>
                                  <td>" . $row["secondSurname"]. "</td>
                                  <td>" . $row["email"]. "</td>
                                  <td>" . $row["status"]. "</td>
                                </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='8'>No results found</td></tr>";
                  }
                  $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

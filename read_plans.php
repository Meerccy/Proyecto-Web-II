<?php
include 'db_connection.php';
$sql = "SELECT * FROM Plan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Plans</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Plan List</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>" . $row["id"]. "</td>
                                  <td>" . $row["name"]. "</td>
                                  <td>" . $row["description"]. "</td>
                                  <td>" . $row["price"]. "</td>
                                  <td>" . $row["status"]. "</td>
                                </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='5'>No results found</td></tr>";
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

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientId = $_POST['clientId'];
    $planId = $_POST['planId'];
    $status = $_POST['status'];

    $sql = "INSERT INTO PlanHistory (clientId, planId, startDate, status) 
            VALUES ('$clientId', '$planId', NOW(), '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered to plan successfully";
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
  <title>Register User to Plan</title>
  <!-- Aquí incluirías los estilos de AdminLTE -->
</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Register User to Plan</h3>
            </div>
            <form method="post" action="register_user_plan.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="clientId">Client ID</label>
                  <input type="number" class="form-control" name="clientId" required>
                </div>
                <div class="form-group">
                  <label for="planId">Plan ID</label>
                  <input type="number" class="form-control" name="planId" required>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="number" class="form-control" name="status" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>

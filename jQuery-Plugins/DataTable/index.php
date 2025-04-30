<?php

$conn=mysqli_connect("localhost","root","","students") or die("connection failed");

$res=mysqli_query($conn,"SELECT * FROM students");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTable with Bootstrap</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DataTables Bootstrap 5 CSS -->
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="p-4">

  <div class="container">
  
    <table id="myTable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while($row=mysqli_fetch_assoc($res)){

      ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['country'] ?></td>
        </tr>
       <?php  } ?>
      </tbody>
    </table>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap Bundle (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables with Bootstrap 5 integration -->
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"></script>

  <!-- DataTable Initialization -->
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({
         "searching":true,
        "paging":true,
        "pageLength":25,
        "responsive":true,
        "order":[[0,"desc"]],
        // Disables sorting on 1st and 4th columns (index starts at 0)
        columnDefs: [
        {
           orderable: false,
            targets: [0, 3] 
          } 
    ]
      });
    });
  </script> 

</body>
</html>

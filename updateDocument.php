<html>


<body>
  
  
<?php

          $con = new mysqli("localhost", "root", "", "db_documents");
          #

          if (!$con){
              die('Could not connect: ' . mysqli_error());
          }

          var_dump($_POST);
          $id = $_POST['id'];
          $author = $_POST["author"];
          $title = $_POST["title"];
          $nr_of_pages = $_POST["nr_of_pages"];
          $type = $_POST["type"];
          $format = $_POST["format"];
          
          $sql = "UPDATE documents SET author='$author', title='$title', nr_of_pages='$nr_of_pages', type='$type', format='$format' WHERE id='$id'";

          
          $result = mysqli_query($con, $sql);
              
          if (!mysqli_query($con, $sql)) {
          printf("%d Row updated.\n", mysqli_affected_rows($con));
          }
              mysqli_close($con);

?>
  </body>
</html>
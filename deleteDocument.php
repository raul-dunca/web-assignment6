<html>


<body>
  
  
  <?php

            $con = new mysqli("localhost", "root", "", "db_documents");
            #

            if (!$con){
                die('Could not connect: ' . mysqli_error());
            }
            
            $id = $_POST['id'];
          
            $sql = "DELETE FROM documents WHERE id=$id";
            $result = mysqli_query($con, $sql);
                
            if (!mysqli_query($con, $sql)) {
					printf("%d Row deleted.\n", mysqli_affected_rows($con));
				}
                mysqli_close($con);
            
        ?>
  </body>
</html>
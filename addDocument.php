<html>


<body>
  
  
  <?php

            $con = new mysqli("localhost", "root", "", "db_documents");
            #

            if (!$con){
                die('Could not connect: ' . mysqli_error());
            }
            
            
            $author = $_POST["author"];
            $title = $_POST["title"];
            $nr_of_pages = $_POST["nr_of_pages"];
            $type = $_POST["type"];
            $format = $_POST["format"];

            $sql = "INSERT INTO documents (author, title, nr_of_pages, type, format ) VALUES ('$author', '$title', '$nr_of_pages','$type', '$format')";
                
            if (!mysqli_query($con, $sql)) {
					printf("%d Row inserted.\n", mysqli_affected_rows($con));
				}
                mysqli_close($con);
            
        ?>
  </body>
</html>
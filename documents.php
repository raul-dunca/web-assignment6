<html>


<body>
  
  
  <?php

            $con = new mysqli("localhost", "root", "", "db_documents");
            #

            if (!$con){
                die('Could not connect: ' . mysqli_error());
            }
            
            $documentFormat = isset($_POST['documentFormat']) ? $_POST['documentFormat'] : '';
            $documentType = isset($_POST['documentType']) ? $_POST['documentType'] : '';

            if (!empty($documentFormat) && !empty($documentType)) {
                $query = "SELECT * FROM documents WHERE format LIKE '%".$documentFormat."%' AND type LIKE '%".$documentType."%'";
            } else {

                if(!empty($documentFormat))
                {
                  $query = "SELECT * FROM documents WHERE format LIKE '%".$documentFormat."%'";
                }
                else
                {
                  if(!empty($documentType))
                  {
                    $query = "SELECT * FROM documents WHERE type LIKE '%".$documentType."%'";
                  }
                  else
                  {
                    $query = "SELECT * FROM documents";
                  }
                }
                
            }



            $result = mysqli_query($con, $query);

            echo "<table border='1'><tr><th>ID</th><th>Author</th><th>Title</th><th>NrOfPages</th><th>Type</th><th>Format</th><th>Operation</th></tr>";

            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['author'] . "</td>";
              echo "<td>" . $row['title'] . "</td>";
              echo "<td>" . $row['nr_of_pages'] . "</td>";
              echo "<td>" . $row['type'] . "</td>";
              echo "<td>" . $row['format'] . "</td>";
              echo "<td>";
              echo "<button class='edit-btn' data-id='" . $row['id'] . "' data-author='" . $row['author'] . "' data-type='" . $row['type'] . "' data-format='" . $row['format'] . "' data-nr-of-pages='" . $row['nr_of_pages'] . "' data-title='" . $row['title'] . "'>Edit</button>";
              echo "<button class='delete-btn'  data-id='" . $row['id'] . "'>Delete</button>";
              echo "</tr>";
            }

            
                
                echo "</table>";
                mysqli_close($con);
            
        ?>
  </body>
</html>
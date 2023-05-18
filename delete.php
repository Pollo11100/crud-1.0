<!DOCTYPE html>
<html>
    <body>
        <?php      
            require_once("connection.php");
           
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				if (isset($_GET['id'])) {
					$sql = "DELETE FROM clients WHERE id = " . $_GET["id"];

					if (mysqli_query($conn, $sql)) {
						//echo "Record deleted successfully";
						header("location: ./add.php");  
						
					} else {
						echo "Error deleting record: " . mysqli_error($conn);
						
					}
					  
				}
			}
            mysqli_close($conn);
			
        ?>


    </body>
</html>
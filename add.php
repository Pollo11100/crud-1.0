<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="style.css">
	</head>

    <body>
        
        <form  method = "post">
            <label>Nome: </label>
            <input type = "text" name = "firstname" id="ciao"> <br>

            <label>Cognome: </label>
            <input type = "text" name = "lastname" id="ciao"> <br>

            <label>Email: </label>
            <input type = "text" name = "email" id="ciao"> <br>

            <button type = "submit" name = "insertData">Submit</button> <br>
           
        </form>
       
       <?php      
            require_once("connection.php");
           
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];

				$sqlInsertData = "INSERT INTO clients (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
		
				if (mysqli_query($conn, $sqlInsertData)) {
					
				} else {
					echo "Error: ".$sqlInsertData."<br>";
					mysqli_error($conn);
				}  
			}

            $sqlReadData = "SELECT * FROM clients";
			$result = mysqli_query($conn, $sqlReadData);
				
			echo "<table>";
			if (mysqli_num_rows($result) > 0) {
				
				while($row = mysqli_fetch_assoc($result)) {

					echo '<tr>';
					foreach ($row as $data) {
						echo "<td>".$data."</td>";
					}
					echo "<td><a href = 'delete.php?id=".$row['id']."'>Delete</a></td>";
					echo "<td><a href = 'edit.php?id= ".$row["id"]."&"."firstname= ".$row["firstname"]."&"."lastname= ".$row["lastname"]."&"."email= ".$row["email"]."'>Edit</a></td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}
			echo "</table>";

            mysqli_close($conn);
        ?>

       
    </body>
</html>
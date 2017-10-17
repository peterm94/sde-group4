<html>
<head>
<title> Bob's Auto Parts</title>
</head>

<body>
<form method="post">
FirstName: <input type="text" name="firstname"><br/><br/>
LastName:  <input type="text" name="lastname"><br/><br/>
Number of Tyres: <input type="number" name="tyres"><br/><br/>
<input type="submit" name="Calculate" value="Submit"><br/>
    
    <?php
    if (isset($_POST['Calculate'])) {
        $servername = "localhost";
        $user="abc";
        $password="abc";
        $dbname="Assignmentdb";

        // Create connection
        $conn = new mysqli($servername, $user, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        $unsafe_firstname = $_POST['firstname'];
        $unsafe_lastname = $_POST['lastname'];
        $unsafe_nooftyres = $_POST['tyres'];
        $unsafe_amount= $unsafe_nooftyres * 110;

        $stmt = $conn->prepare("INSERT INTO orders (firstname, lastname, noOftyres, amount) VALUES (?, ?, ?, ?)");

        // "s" means the database expects a string "i" means integer
        $stmt->bind_param("ssii", $unsafe_firstname, $unsafe_lastname, $unsafe_nooftyres, $unsafe_amount);

		$result = $stmt->execute();

		if($result) {
			echo "Successfully updated!";
		} else {
			echo "Failed to update!";
		}

			$stmt->close();
			$conn->close();
    }
    ?>
    </form>
</body>
</html>

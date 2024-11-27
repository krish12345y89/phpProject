<!DOCTYPE html>
<html>
<head>
	<title>Admission Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: whitesmoke; /* light gray background color */
		}
		form {
			width: 50%; /* set the width of the form */
			margin: 40px auto; /* center the form horizontally */
			padding: 20px; /* add some padding around the form */
			border: 3px solid #751f1f; /* add a border around the form */
			border-radius: 30px; /* add a rounded corner to the form */
			box-shadow: 0 0 30px rgba(132, 8, 8, 0.1); /* add a subtle shadow to the form */
		}
		label {
			display: block; /* make the label a block element */
			margin-bottom: 10px; /* add some space between labels */
		}
		input, textarea {
			width: 100%; /* make the input fields and textarea full-width */
			padding: 10px; /* add some padding to the input fields and textarea */
			margin-bottom: 20px; /* add some space between input fields and textarea */
			border: 1px solid #95929a; /* add a border around the input fields and textarea */
		}
		input[type="submit"] {
			background-color: #874caf; /* green background color for the submit button */
			color: #FFFFFF; /* white text color for the submit button */
			padding: 10px 20px; /* add some padding to the submit button */
			border: none; /* remove the border around the submit button */
			border-radius: 5px; /* add a rounded corner to the submit button */
			cursor: pointer; /* change the cursor to a pointer when hovering over the submit button */
		}
		input[type="submit"]:hover {
			background-color: #3e8e41; /* darker green background color on hover */
		}
	</style>
</head>
<body>
<form action="./text.php" method="POST">
		<h2>Admission Form</h2>
		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone"><br><br>
        <label for="father_name">Father name:</label>
		<input type="text" id="father_name" name="father_name"><br><br>
        <label for="mother_name">Mother name:</label>
		<input type="text" id="mother_name" name="mother_name"><br><br>
        <label for="dmc_10th">DMC for 10th:</label>
		<input type="text" id="dmc_10th" name="dmc_10th"><br><br>
        <label for="dmc_12th">DMC of 12th:</label>
		<input type="text" id="dmc_12th" name="dmc_12th"><br><br>
        <p><h7>NOTE:- FOR LATERAL ENTERY YOU MUST PASS OUT FROM 12TH CLASS IN NON-MED. STREAM</h7> </p>
		<label for="branch">Branch:</label>
		<select id="branch" name="branch">
			<option value="">Select a trade</option>
			<option value="Diploma of  in Computer Science"> Diploma   in Computer Science</option>
			<option value="Diploma of in Civil "> Diploma of in Civil</option>
			<option value=" Diploma of in I&C"> Diploma of in I&C </option>
            <option value="Diploma of in Mechanical"> Diploma of in Mechanical </option>
		</select><br><br>
		<label for="semester">Semester:</label>
		<select id="semester" name="semester">
			<option value="">Select a semester</option>
			<option value="1st">1st</option>
			<option value="3rd for lateral entry">3rd for lateral entry</option>
		</select><br><br>
		<label for="remarks">Student Remarks:</label>
		<textarea id="remarks" name="remarks"></textarea><br><br>
		<input type="submit" value="Submit">
</form>
	<?php
	// Check if the form has been submitted using GET or POST method
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Get data from query string
		$name = $_GET['name'];
		$email = $_GET['email'];
		$phone = $_GET['phone'];
		$father_name = $_GET['father_name'];
		$mother_name = $_GET['mother_name'];
		$dmc_10th = $_GET['dmc_10th'];
		$dmc_12th = $_GET['dmc_12th'];
		$branch = $_GET['branch'];
		$semester = $_GET['semester'];
		$remarks = $_GET['remarks'];

		// Process get data
		echo "Thank you for submitting the admission form, " . $name . "!<br>";
		echo "Your email is: " . $email . "<br>";
		echo "Your phone number is: " . $phone . "<br>";
		echo "Your father's name is: " . $father_name . "<br>";
		echo "Your mother's name is: " . $mother_name . "<br>";
		echo "Your DMC for 10th is: " . $dmc_10th . "<br>";
		echo "Your DMC for 12th is: " . $dmc_12th . "<br>";
		echo "You have chosen the " . $branch . " branch.<br>";
		echo "You have chosen the " . $semester . " semester.<br>";
		echo "Your remarks are: " . $remarks . "<br>";
	} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Get data from post request
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$dmc_10th = $_POST['dmc_10th'];
		$dmc_12th = $_POST['dmc_12th'];
		$branch = $_POST['branch'];
		$semester = $_POST['semester'];
		$remarks = $_POST['remarks'];

		// Process post data
		echo "Thank you for submitting the admission form, " . $name . "!<br>";
		echo "Your email is: " . $email . "<br>";
		echo "Your phone number is: " . $phone . "<br>";
		echo "Your father's name is: " . $father_name . "<br>";
		echo "Your mother's name is: " . $mother_name . "<br>";
		echo "Your DMC for 10th is: " . $dmc_10th . "<br>";
		echo "Your DMC for 12th is: " . $dmc_12th . "<br>";
		echo "You have chosen the " . $branch . " branch.<br>";
		echo "You have chosen the " . $semester . " semester.<br>";
		echo "Your remarks are: " . $remarks . "<br>";
	} else {
		// Display the form
	?>
	<?php } ?>
</body>
</html>
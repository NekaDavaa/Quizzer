<?php include 'database.php'?>


<!-- $number = (int) $_GET['n'];
$stmt = $mysqli->prepare("SELECT * FROM `questions` WHERE `question_number` = ?");
$stmt->bind_param("i", $number);
$stmt->execute();
$result = $stmt->get_result();
$row = null;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();  // Fetch the row
}
$stmt->close();
$mysqli->close(); -->

<?php
$number = (int) $_GET['n'];
$query = "SELECT * FROM `questions` WHERE `question_number` = $number";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question 1 of 5</div>
			<p class="question">
			<?php echo $row['text']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<li><input name="choice" type="radio" value="1" />PHP: Hypertext Preprocessor</li>
					<li><input name="choice" type="radio" value="1" />Private Home Page</li>
					<li><input name="choice" type="radio" value="1" />Personal Home Page</li>
					<li><input name="choice" type="radio" value="1" />Personal Hypertext Preprocessor</li>
				</ul>
				<input type="submit" value="Submit" />
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2014, PHP Quizzer
		</div>
	</footer>
</body>
</html>


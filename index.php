<?php include 'database.php' ?>
<?php
//Number of rows
$query = "SELECT * FROM `questions`";
$result = mysqli_query($mysqli, $query);
$num_rows = mysqli_num_rows($result);
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
			<h2>Test Your PHP Knowledge</h2>
			<p>This is a multiple choice quiz to test your knowledge of PHP</p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $num_rows;?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $num_rows * 0.5;?> minutes</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2014, PHP Quizzer <br />
			  <a href="https://github.com/NekaDavaa/Quizzer" target="_blank">Click on the link to overview the project code...</a>
		</div>
	</footer>
</body>
</html>
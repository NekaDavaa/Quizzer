<?php include 'database.php'?>
<?php session_start();?>
<?php
//Query for the questions table
$number = (int) $_GET['n'];
$query = "SELECT * FROM `questions` WHERE `question_number` = $number";
$result = mysqli_query($mysqli, $query);
$question = mysqli_fetch_assoc($result);
//Query for the choices
$query = "SELECT * FROM `choices` WHERE `question_number` = $number";
$choices = mysqli_query($mysqli, $query);

$query = "select * from `questions`";
$result = mysqli_query($mysqli, $query);
$total_q_rows = mysqli_num_rows($result);


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
			<div class="current">Question <?php echo $number; ?> of <?php echo $total_q_rows; ?></div>
			<p class="question">
			<?php echo $question['text']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					
                    <?php while ($row = mysqli_fetch_assoc($choices)) : ?>
					<li><input name="choice" type="radio" value="<?php echo $row['id'];?>" /><?php echo $row['text'];?></li>
					<?php endwhile ?>
				</ul>
				<input type="submit" name="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
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


<?php include 'database.php' ?>

<?php

$query = "select * from questions";
$result = $mysqli->query($query);
$next_question = mysqli_num_rows($result);

if (isset($_POST['submit'])) {
$question_number = $_POST['question_number'];
$question_text = $_POST['question_text'];
$choices = array();
$choices[1] = $_POST['choice1'];
$choices[2] = $_POST['choice2'];
$choices[3] = $_POST['choice3'];
$choices[4] = $_POST['choice4'];
$choices[5] = $_POST['choice5'];
$correct_choice = $_POST['correct_choice'];

//The Query
$query = "insert into questions (`question_number`, `text`) values ('$question_number', '$question_text')";
//Run Query
$insert_row = $mysqli->query($query) or die;

if($insert_row) {
  $is_correct = 0;
  foreach ($choices as $choice => $value) {
      if($choice == $correct_choice) {
                 $is_correct = 1;
      }
       else {
       	 $is_correct = 0;
       } 
 $query = "insert into `choices` (`question_number`, `is_correct`, `text`) values ('$question_number', '$is_correct', '$value')";
 $choice_insert = $mysqli->query($query) or die;   

 
}
}
}
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
			<h2>Add A Question</h1>
			<form method="post" action="add.php">
				<p style="display: none;">
					<label>Question Number: </label>
					<input type="number" name="question_number" value="<?php echo $next_question + 1; ?>"/> 
				</p>
				<p>
					<label>Question Text: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Choice #1: </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Choice #2: </label>
					<input type="text" name="choice2" />
				</p>
				<p>
					<label>Choice #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Choice #4: </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Choice #5: </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Correct Choice Number: </label>
					<input type="number" name="correct_choice" />
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" />
				</p>
			</form>
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
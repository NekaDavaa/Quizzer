<!DOCTYPE html>
<?php session_start();?>
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
       <?php if ($_SESSION['score'] > 2): ?>
       <div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Final Score: <?php echo $_SESSION['score'];?></p>
				<a href="question.php?n=1" class="start">Take Again</a></div>
       <?php else: ?>
       <div class="container">
			<h2>You finish the quiz!</h2>
				<p>Sorry! You have work more to take the exam</p>
				<p>Final Score: <?php echo $_SESSION['score'];?></p>
				<a href="question.php?n=1" class="start">Take Again</a>
		</div>
       <?php endif; ?>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2014, PHP Quizzer
		</div>
	</footer>
</body>
</html>

<?php
session_unset();
session_destroy();
?>




<?php include 'database.php';?>
<?php session_start();?>
<?php 
//Session for store scores 
    if(!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
?>
<?php 
if (isset($_POST['submit'])) {
    if (isset($_POST['choice'])) {
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];

    //Query for correct answer
    $query = "select * from `choices` where `question_number` = $number and `is_correct` = 1";
    $result = mysqli_query($mysqli, $query);
    $choice_fetch = mysqli_fetch_assoc($result);
    $correct_choice = $choice_fetch['id'];

    //Query for total questions rows

    $query = "select * from `questions`";
    $result = mysqli_query($mysqli, $query);
    $total = mysqli_num_rows($result);
//Collect correct answers
if($selected_choice === $correct_choice) {
    $_SESSION['score']++;
}
if ($number == $total) {
    header("Location:final.php");
    exit();
}
else {
    header("Location:question.php?n=" . $number+1); 
}
}
else {
    $number = $_POST['number'];
    header("Location:question.php?n=" . $number . "&error=Please+make+a+choice");
}

}
?>
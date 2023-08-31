<?php include 'database.php';  session_start();?>

<?php 
if (isset($_POST['submit'])) {
    echo 'I am submit';
} else {
    echo 'I am NOT submit';
}
?>
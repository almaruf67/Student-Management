<?php
include_once("config.php");

if(isset($_POST['tsignup']))
{
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$query ="INSERT INTO teacher(ID,Name,Email,Password) VALUES('$id','$name','$email','$pass')";     
if ($mysqli->query($query) === TRUE) {
      echo "Records updated: ";
} else {
      echo "Error: ";
}
header("location:index.php");

}

else if(isset($_POST['ssignup'])){
      $id=$_POST["id"];
      $name=$_POST["name"];
      $email=$_POST["email"];
      $pass=$_POST["password"];
      $semester=$_POST["semester"];
      $section=$_POST["section"];
      $query ="INSERT INTO student(ID,Name,Email,Password,Semester,Section) VALUES('$id','$name','$email','$pass','$semester','$section')";     
      if ($mysqli->query($query) === TRUE) {
            echo "Records updated: ";
      } else {
            echo "Error: ";
      }
header("location:index.php");
}



?>
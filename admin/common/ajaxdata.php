<?php
include('database.php');

// get name of student
if(isset($_POST['rollsel']))
{
    $query = "SELECT * FROM `student_tb` WHERE `roll` = '{$_POST['studentroll']}'";
    $result = $conn->query($query);
    

    while($row = $result->fetch_array())
    {
        echo $row["name"];
       
    }

}


// insert marksheet data
if(isset($_POST['addresult']))
{
   $sname = $_POST["sname"];
   $sroll = $_POST["sroll"];
   $ssem = $_POST["ssem"];


   $res_array = [];
   $data = $_POST["resdata"];

  foreach($data as $row)
	{
		array_push($res_array, $row);
		header('Content-type: application/json');
		$marksdata =  json_encode($res_array);
	}
   
   $query = "INSERT INTO `declared_res_tb`(`sname`, `sroll`, `ssemester`, `marksdata`)  VALUES ('$sname','$sroll','$ssem','$marksdata')";
   $query2 = "UPDATE `student_tb` SET `rstatus`= 1 WHERE `roll` = '$sroll' ";
   $conn->query($query);
   $conn->query($query2);
}


// Update marksheet data
if(isset($_POST['updmarks']))
{
  
   $sroll = $_POST["sroll"];
   $sem = $_POST["ssem"];

   $tmark = $_POST["tomark"];
   $markobt =$_POST["tobt"];

   $res_array = [];
   $data = $_POST["updatedresult"];

  foreach($data as $row)
	{
		array_push($res_array, $row);
		header('Content-type: application/json');
		$updmarksdata =  json_encode($res_array);
	}
   
   $query = "UPDATE `declared_res_tb` SET `marksdata`= '$updmarksdata' WHERE `sroll` = '$sroll' AND `ssemester` = '{$sem}'";
   $conn->query($query);
}
?>
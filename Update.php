<?php 
require_once("db.php");
$searchqueryparameter=$_GET["id"];
if (isset($_POST["Submit"])){

$Rollno=$_POST["Rollno"];
$Stdname=$_POST["StdName"];
$Fac=$_POST["Faculty"];
$Add=$_POST["Address"];
$con=$_POST["contact"];
global $connection;
$sql= "UPDATE record SET Rollno='$Rollno',StudentName='$Stdname',Faculty='$Fac',Address='$Add',contact=$con WHERE id= '$searchqueryparameter'";
$Execute= $connection->query($sql);
if($Execute) {
    echo '<script>window.open("viewdb.php?id=Record updated successfully","_self")</script>';
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update data into database</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

 <?php 
 
global $connection;
$sql= "SELECT * FROM record WHERE id='$searchqueryparameter'";
$stmt= $connection->query($sql);
while($DataRows=$stmt->fetch()){
    $Id=$DataRows["id"];
            $Rollno=$DataRows["Rollno"];
            $StudentName=$DataRows["StudentName"];
            $Faculty=$DataRows["Faculty"];
            $Address= $DataRows["Address"];
            $con=$DataRows["contact"];
           
 
}

 ?>
    <div class="">
        <form action="Update.php?id=<?php echo $searchqueryparameter;?>" method="POST">
          <fieldset> 
              
         
                <span class="Studentname">Rollno: </span>
                <br>
                    <input type="text" name="Rollno" value="<?php echo$Rollno;?>">
                    <br>
                <span class="Studentname">Student Name: </span>
                    <br>
                    <input type="text" name="StdName" value="<?php echo$StudentName;?>">
                    <br>
                <span class="Studentname">Faculty: </span>
                    <br>
                    <input type="text" name="Faculty" value="<?php echo $Faculty;?>">
                    <br>
                <span class="Studentname">Address </span>
                    <br>
                    <input type="text" name="Address" value="<?php echo $Address;?>">
                    <br>       
                <span class="Studentname">Contact No: </span>
                    <br>
                    <input type="text" name="contact" value="<?php echo $con;?>">
                    <br>         
            
                <input type="submit" name="Submit" value="Submit">
                
                </fieldset>

           
         </form>    
    </div>        
    
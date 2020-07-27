<?php 
require_once("db.php");
$RollError="";
$NameError="";
$FacError="";
$AddError="";
$ContactError="";


if(isset($_POST['Submit'])){
    if(empty($_POST["Rollno"])){
		$RollError="Rollno is required";
       }
       else {
           $Rollno = Test_User_Input($_POST["Rollno"]);
           if(!preg_match("/\b([1-9]|[1-9][0-9]|100)\b/",$Rollno)){
            $RollError="only digit is allowed";	
        }
    }
	if(empty($_POST["StdName"])){
		$NameError="Name is required";
       }
       else {
           $Stdname = Test_User_Input($_POST["StdName"]);
           if(!preg_match("/^[A-Za-z.\ ]*$/",$Stdname)){
            $NameError="only letters and white space are required";	
        }
           }
           if(empty($_POST["Faculty"])){
            $FacError="Email is required";
           }
           else {
               $Fac= Test_User_Input($_POST["Faculty"]);
               if(!preg_match("/^[A-Za-z.\ ]*$/",$Fac)){
               $FacError="invalid Email format";
               }
            } 
        if(empty($_POST["Address"])){
                $AddError="Address is required";
               }
               else {
                   $Add= Test_User_Input($_POST["Address"]);
                   if(!preg_match("(([A-Za-z]+([-][0-9]{1,2})?)|([A-Za-z]*[-][0-9]{1,2}[,][A-Za-z]+))",$Add)){
                    $AddError="only letters and white space are required";	
                }  
            }     
        if(empty($_POST["contact"])){
            $ContactError="Contact is required";
           }
           else {
               $con = Test_User_Input($_POST["contact"]);
               if(!preg_match("/^[6-9]\d{9}$/",$con)){
               $ContactError="invalid number format";
               }
            } 






            global $connection;
            $sql= "INSERT INTO record(Rollno,StudentName,Faculty,Address,contact)
            VALUES(:rollnO,:stdnamE,:facultY,:addresS,:contacT)";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue('rollnO',$Rollno);
            $stmt->bindValue('stdnamE',$Stdname);
            $stmt->bindValue('facultY',$Fac);
            $stmt->bindValue('addresS',$Add);
            $stmt->bindValue('contacT',$con);
            
            $Execute= $stmt->execute();
            if($Execute) {
                echo '<span class="fieldheading">Record has been added successfully<br></span>';
              
               echo '<span class="success"><a href="viewdb.php"> See all records</a></span>';
            }

       }
function Test_User_Input($Data){
  return $Data;
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Insert into database</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php ?>
    <div class="">
        <form action="index.php" method="POST">
          <fieldset> 
              
         
                <span class="Studentname">Rollno: </span>
                <br>
                    <input type="text" name="Rollno" value="">
                    <br>
                <span class="Studentname">Student Name: </span>
                    <br>
                    <input type="text" name="StdName" value="">
                    <br>
                <span class="Studentname">Faculty: </span>
                    <br>
                    <input type="text" name="Faculty" value="">
                    <br>
                <span class="Studentname">Address </span>
                    <br>
                    <input type="text" name="Address" value="">
                    <br>     
                <span class="Studentname">Contact No: </span>
                    <br>
                    <input type="text" name="contact" value="">
                    <br>    
                <input type="submit" name="Submit" value="Submit">
                
                </fieldset>

           
         </form>    
    </div>        
    
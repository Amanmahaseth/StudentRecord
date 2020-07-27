<?php 
require_once("db.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data from database</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2 class="success"> <?php echo @$_GET["id"];?></h2>
<div class="">
    <fieldset>
        <form class="" action="viewdb.php" method="GET">
            <input type="text" name="Search" value="" placeholder="Search by Rollno and StudentName">
            <input type="submit" name="SearchButton" value="Search record">

    </fieldset>
    
</div>
<?php 
if(isset($_GET["SearchButton"])){
    global $connection;
    $Search=$_GET["Search"];
    $sql="SELECT * FROM record WHERE Rollno=:searcH OR StudentName=:searcH";
    $stmt=$connection->prepare($sql);
    $stmt->bindValue(':searcH',$Search);
    $stmt->execute();
    while($DataRows=$stmt->fetch()){
            $Id=$DataRows["id"];
            $Rollno=$DataRows["Rollno"];
            $StudentName=$DataRows["StudentName"];
            $Faculty=$DataRows["Faculty"];
            $Address= $DataRows["Address"];
            $con=$DataRows["contact"];
           ?>
           <div class="">
           <table width="900" border="5" align="center"> 
               <caption> Search Result</caption>
               <tr>
                <th>ID</th>
                <th>Rollno:</th>
                <th>Student Name</th>
                <th>Faculty</th>
                <th>Address</th>
                <th>Contact No.</th>
            
                </tr>       
            <tr>
               <td><?php echo $Id; ?></td> 
                <td><?php echo $Rollno; ?></td> 
                <td><?php echo $StudentName; ?></td>
                <td><?php echo $Faculty; ?></td>
                <td><?php echo $Address; ?></td>
                <td><?php echo $con; ?></td>
                <td><a href="viewdb.php">Search Again</a></td>
            </tr>
           </table>
    </div>
 <?php   }
}
?>


    <table width="1000" border="5" align="center"> 
        <caption>View from Database</caption>
        <tr>
            <th>ID</th>
            <th>Rollno:</th>
            <th>Student Name</th>
            <th>Faculty</th>
            <th>Address</th>
            <th>Contact No.</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>       
        
    <?php 
        $connection;
        $sql= "SELECT * FROM record ORDER BY Rollno ASC";
        $stmt= $connection->query($sql);
        while($DataRows=$stmt->fetch()){
            $Id=$DataRows["id"];
            $Rollno=$DataRows["Rollno"];
            $StudentName=$DataRows["StudentName"];
            $Faculty=$DataRows["Faculty"];
            $Address= $DataRows["Address"];
            $con=$DataRows["contact"];
            
 

        
        
    ?> 
    <tr>
        <td><?php echo $Id; ?></td> 
        <td><?php echo $Rollno; ?></td> 
        <td><?php echo $StudentName; ?></td>
        <td><?php echo $Faculty; ?></td>
        <td><?php echo $Address; ?></td>
        <td><?php echo $con; ?></td>
        
        <td> <a href="Update.php?id=<?php echo $Id;?> ">Update</a></td>
        <td> <a href="Delete.php?id=<?php echo $Id;?> ">Delete</a></td>
    </tr>   
     <?php   } ?>
    </table>

    <div class=" ">
        
    </div>        
    
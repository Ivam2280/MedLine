<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Patients</title>
</head>
<body>
    <?php
        session_start();
        
        if(isset($_SESSION["user"])){
            if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
                header("location: ../index.php");
            }
        
        }else{
            header("location: ../index.php");
        }
        
        
        
        include("../connection.php");
    ?>
<!--p--->
                            <?php
                                echo '<datalist id="patient">';
                                $list11 = $database->query("select  pname,pemail from patient;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["pname"];
                                    $c=$row00["pemail"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
                            ?>
<!--p--->
                    <?php
                        if($_POST){
                            $keyword=$_POST["search"];
                            
                            $sqlmain= "select * from patient where pemail='$keyword' or pname='$keyword' or pname like '$keyword%' or pname like '%$keyword' or pname like '%$keyword%' ";
                        }else{
                            $sqlmain= "select * from patient order by pid desc";

                        }
                    ?>
<!--p--->
<!--k--->
<!--p--->
<?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
            $sqlmain= "select * from patient where pid='$id'";
            //<!--k--->
    }
?>
</body>
</html>

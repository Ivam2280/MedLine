<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Sessions</title>
</head>
<body>
    <?php
        //<!---k--->
        $userrow = $database->query("select * from patient where pemail='$useremail'");
        $userfetch=$userrow->fetch_assoc();
        $userid= $userfetch["pid"];
        $username=$userfetch["pname"];
        //<!---k--->
    ?>
    <!---p--->
    <?php
        echo '<datalist id="doctors">';
        $list11 = $database->query("select DISTINCT * from  doctor;");
        $list12 = $database->query("select DISTINCT * from  schedule GROUP BY title;");
        //<!---k--->
    ?>
    <!---p--->
    <?php  
        if(($_GET)){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $sqlmain= "select * from schedule inner join doctor on schedule.docid=doctor.docid where schedule.scheduleid=$id  order by schedule.scheduledate desc";
                $result= $database->query($sqlmain);
                $row=$result->fetch_assoc();
                $scheduleid=$row["scheduleid"];
                $title=$row["title"];
                $docname=$row["docname"];
                $docemail=$row["docemail"];
                $scheduledate=$row["scheduledate"];
                $scheduletime=$row["scheduletime"];
                $sql2="select * from appointment where scheduleid=$id";
                $result12= $database->query($sql2);
                $apponum=($result12->num_rows)+1;
                //<!---k--->
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Appointments</title>
</head>
<body>
    <?php
        //<!--k--->
        $userrow = $database->query("select * from doctor where docemail='$useremail'");
        $userfetch=$userrow->fetch_assoc();
        $userid= $userfetch["docid"];
        $username=$userfetch["docname"];
    ?>
    <!--p--->
    $list110 = $database->query("select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  doctor.docid=$userid ");
    <!--p--->
    <?php
        $sqlmain= "select appointment.appoid,schedule.scheduleid,schedule.title,doctor.docname,patient.pname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  doctor.docid=$userid ";
        if ($_POST) {
            if (!empty($_POST["sheduledate"])) {
                $sheduledate=$_POST["sheduledate"];
                $sqlmain.=" and schedule.scheduledate='$sheduledate' ";
            };
        }
    ?>
    <!--p--->
    <?php
        //<!--k--->
        $list11 = $database->query("select  * from  doctor;");
        for ($y=0;$y<$list11->num_rows;$y++){
            $row00=$list11->fetch_assoc();
            $sn=$row00["docname"];
            $id00=$row00["docid"];
            //<!--k--->
        };
        //<!--k--->
        $sqlmain= "select * from doctor where docid='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $name=$row["docname"];
        $email=$row["docemail"];
        $spe=$row["specialties"];
                
        $spcil_res= $database->query("select sname from specialties where id='$spe'");
        $spcil_array= $spcil_res->fetch_assoc();
        $spcil_name=$spcil_array["sname"];
        $tele=$row['doctel'];
        //<!--k--->
    ?>
</body>
</html>

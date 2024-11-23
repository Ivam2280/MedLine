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
        //<!---k--->
        $userrow = $database->query("select * from patient where pemail='$useremail'");
        $userfetch=$userrow->fetch_assoc();
        $userid= $userfetch["pid"];
        $username=$userfetch["pname"];

        $sqlmain= "select appointment.appoid,schedule.scheduleid,schedule.title,doctor.docname,patient.pname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid ";

        if($_POST){
            if(!empty($_POST["sheduledate"])){
                $sheduledate=$_POST["sheduledate"];
                $sqlmain.=" and schedule.scheduledate='$sheduledate' ";
            }
        }

        $sqlmain.="order by appointment.appodate  asc";
        $result= $database->query($sqlmain);
    ?>
    <!---p--->
    <!---k--->
    <!---p--->
    <?php
        if ($_GET) {
            //<!---k--->
        } elseif ($action=='view') {
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
            //<!---k--->
        }
    ?>
   
</body>
</html>

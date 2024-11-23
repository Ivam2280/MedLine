<?php
    //<!---k--->
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    if($_POST){
        if(isset($_POST["booknow"])){
            //<!---k--->
            $sql2="insert into appointment(pid,apponum,scheduleid,appodate) values ($userid,$apponum,$scheduleid,'$date')";
            //<!---k--->
        }
    }
?>

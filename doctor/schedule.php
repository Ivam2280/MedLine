<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Schedule</title>
</head>
<body>

<!----k------>

<div class="container">
     <div class="menu">
     <table class="menu-container" border="0">
             <tr>
                 <td style="padding:10px" colspan="2">
                     <table border="0" class="profile-container">
                         <tr>
                             <td width="30%" style="padding-left:20px" >
                                 <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                             </td>
                             <td style="padding:0px;margin:0px;">
                                 <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                 <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                             </td>
                         </tr>
                 </table>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-dashbord " >
                     <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div></a>
                 </td>
             </tr>
             <tr class="menu-row">
                 <td class="menu-btn menu-icon-appoinment  ">
                     <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                 </td>
             </tr>
             
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-session menu-active menu-icon-session-active">
                     <a href="schedule.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">My Sessions</p></div></a>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-patient">
                     <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">My Patients</p></a></div>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-settings">
                     <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                 </td>
             </tr>
             
         </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="2.5%" >
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">My Sessions</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('Europe/Kiev');
                        $today = date('Y-m-d');
                        echo $today;

                        $list110 = $database->query("select  * from  schedule where docid=$userid;");

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">My Sessions (<?php echo $list110->num_rows; ?>) </p>
                    </td>
                    
                </tr>
                
               
                            </table>

                        </center>
                    </td>
                    
                </tr>

<!----k------>

</body>
</html>
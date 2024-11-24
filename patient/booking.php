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
        

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../index.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../index.php");
    }
    

    include("../connection.php");
        $userrow = $database->query("select * from patient where pemail='$useremail'");
        $userfetch=$userrow->fetch_assoc();
        $userid= $userfetch["pid"];
        $username=$userfetch["pname"];
        date_default_timezone_set('Europe/Kiev');

    $today = date('Y-m-d');
    ?>
    <!---p--->
    <?php
        echo '<datalist id="doctors">';
        $list11 = $database->query("select DISTINCT * from  doctor;");
        $list12 = $database->query("select DISTINCT * from  schedule GROUP BY title;");
        

                                            


        for ($y=0;$y<$list11->num_rows;$y++){
            $row00=$list11->fetch_assoc();
            $d=$row00["docname"];
           
            echo "<option value='$d'><br/>";
           
        };


        for ($y=0;$y<$list12->num_rows;$y++){
            $row00=$list12->fetch_assoc();
            $d=$row00["title"];
           
            echo "<option value='$d'><br/>";
                                                     };

    echo ' </datalist>';
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
                
                echo '
                <form action="booking-complete.php" method="post">
                    <input type="hidden" name="scheduleid" value="'.$scheduleid.'" >
                    <input type="hidden" name="apponum" value="'.$apponum.'" >
                    <input type="hidden" name="date" value="'.$today.'" >

                
            
            ';
             

            echo '
            <td style="width: 50%;" rowspan="2">
                    <div  class="dashboard-items search-items"  >
                    
                        <div style="width:100%">
                                <div class="h1-search" style="font-size:25px;">
                                    Session Details
                                </div><br><br>
                                <div class="h3-search" style="font-size:18px;line-height:30px">
                                    Doctor name:  &nbsp;&nbsp;<b>'.$docname.'</b><br>
                                    Doctor Email:  &nbsp;&nbsp;<b>'.$docemail.'</b> 
                                </div>
                                <div class="h3-search" style="font-size:18px;">
                                  
                                </div><br>
                                <div class="h3-search" style="font-size:18px;">
                                    Session Title: '.$title.'<br>
                                    Session Scheduled Date: '.$scheduledate.'<br>
                                    Session Starts : '.$scheduletime.'<br>
                                </div>
                                <br>
                                
                        </div>
                                
                    </div>
                </td>
                
                
                
                <td style="width: 25%;">
                    <div  class="dashboard-items search-items"  >
                    
                        <div style="width:100%;padding-top: 15px;padding-bottom: 15px;">
                                <div class="h1-search" style="font-size:20px;line-height: 35px;margin-left:8px;text-align:center;">
                                    Your Appointment Number
                                </div>
                                <center>
                                <div class=" dashboard-icons" style="margin-left: 0px;width:90%;font-size:70px;font-weight:800;text-align:center;color:var(--btnnictext);background-color: var(--btnice)">'.$apponum.'</div>
                            </center>
                               
                                </div><br>
                                
                                <br>
                                <br>
                        </div>
                                
                    </div>
                </td>
                </tr>
                <tr>
                    <td>
                        <input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:10px;padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:95%;text-align: center;" value="Book now" name="booknow"></button>
                    </form>
                    </td>
                </tr>
                '; 
                




        }



    }
    
    ?>

    </tbody>

</table>
</div>
</center>
</td> 
</tr>



</table>
</div>
</div>



</div>

</body>
</html>

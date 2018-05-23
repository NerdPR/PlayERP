<?php

require_once '../../../../dbconfig.php';

if($_POST)
{
    $EnqFOREA = $_POST['EnqFOREA'];
    $nameofcandidate = $_POST['nameofcandidate'];
    
    $kiddob = $_POST['dob'];
    $kiddob=str_replace("/","-",$kiddob);
    $kiddobdate=date_create($kiddob);
    $kiddob= date_format($kiddobdate,"Y/m/d H:i:s");

    $School = $_POST['School'];
    $age = $_POST['age'];
    $parentspousename = $_POST['parentspousename'];
    $mobileno = $_POST['mobileno'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];    
    $otherspecify=$_POST['otherspecify'];
    $wassappno=$_POST['wassappno'];
    $contactno=$_POST['contactno'];
    $howdouknow=$_POST['howdouknow'];
   
    $content="xxxx";

    //echo (date_create("19/JULY/2017"));

    try
    {

        /*$stmt = $db_con->prepare("select * from client where clientname=:clientname");
        $stmt->execute(array(":clientname"=>$clientname));
        $count = $stmt->rowCount();*/

        //if($count==0){

            $stmt = $db_con->prepare("INSERT INTO COMPENQ (ENQFOR,CANDIDATENAME,SCHOOL,AGE,DOB,PARENTSNAME,PARENTSMOBNO,ADDRESS,LANDMARK,OTHERS,WHATSAPPNO,EMCONTACTNO,COMPABOUT)values(:ENQFOR,:CANDIDATENAME,:SCHOOL,:AGE,:DOB,:PARENTSNAME,:PARENTSMOBNO,:ADDRESS,:LANDMARK,:OTHERS,:WHATSAPPNO,:EMCONTACTNO,:COMPABOUT)");
                        
            $stmt->bindParam(":ENQFOR",$EnqFOREA);
            $stmt->bindParam(":CANDIDATENAME",$nameofcandidate);
            $stmt->bindParam(":SCHOOL",$School);
            $stmt->bindParam(":AGE",$age);
            $stmt->bindParam(":DOB",$kiddob);
            $stmt->bindParam(":PARENTSNAME",$parentspousename);
            $stmt->bindParam(":PARENTSMOBNO",$mobileno);
            $stmt->bindParam(":ADDRESS",$address);
            $stmt->bindParam(":LANDMARK",$landmark);
            $stmt->bindParam(":OTHERS",$otherspecify);
            $stmt->bindParam(":WHATSAPPNO",$wassappno);
            $stmt->bindParam(":EMCONTACTNO",$contactno);
            $stmt->bindParam(":COMPABOUT",$howdouknow);
            

            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

       /* }
        else{

            echo "1"; //  not available
        }*/

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
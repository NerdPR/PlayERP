<?php

require_once '../../../../dbconfig.php';

if($_POST)
{
    $AdmissionEnqFor = $_POST['AdmissionEnqFor'];
    $nameofkid = $_POST['nameofkid'];
    
    $kiddob = $_POST['kiddob'];
    $kiddob=str_replace("/","-",$kiddob);
    $kiddobdate=date_create($kiddob);
    $kiddob= date_format($kiddobdate,"Y/m/d H:i:s");

    $kidage = $_POST['kidage'];
    $nameoffather = $_POST['nameoffather'];
    $fathermobno = $_POST['fathermobno'];
    $fatheroccupation = $_POST['fatheroccupation'];
    $nameofmother = $_POST['nameofmother'];
    $mothermobno = $_POST['mothermobno'];    
    $motheroccupation=$_POST['motheroccupation'];
    $resaddress=$_POST['resaddress'];
    $landmark=$_POST['landmark'];
    $howdouknow=$_POST['howdouknow'];
    $anyreference=$_POST['anyreference'];
    $feetold=$_POST['feetold'];
    $offergiven=$_POST['offergiven'];
    $findfee=$_POST['findfee'];
    $typeofenquiry=$_POST['typeofenquiry'];
    $status=$_POST['status'];
    $finalstatus=$_POST['finalstatus'];
    
    $finaldate = $_POST['finaldate'];
    $finaldate=str_replace("/","-",$finaldate);
    $finaldatedate=date_create($finaldate);
    $finaldate= date_format($finaldatedate,"Y/m/d H:i:s");

    $followup1=$_POST['followup1'];

    $followup1Date = $_POST['followup1Date'];
    $followup1Date=str_replace("/","-",$followup1Date);
    $followup1Datedate=date_create($followup1Date);
    $followup1Date= date_format($followup1Datedate,"Y/m/d H:i:s");

    $followup2=$_POST['followup2'];

    $followup2Date = $_POST['followup2Date'];
    $followup2Date=str_replace("/","-",$followup2Date);
    $followup2Datedate=date_create($followup2Date);
    $followup2Date= date_format($followup2Datedate,"Y/m/d H:i:s");

    $followup3=$_POST['followup3'];
    
    $followup3Date = $_POST['followup3Date'];
    $followup3Date=str_replace("/","-",$followup3Date);
    $followup3Datedate=date_create($followup3Date);
    $followup3Date= date_format($followup3Datedate,"Y/m/d H:i:s");

    

    /*$fileName = $_FILES['Attach']['name'];
    $tmpName  = $_FILES['Attach']['tmp_name'];
    $fileSize = $_FILES['Attach']['size'];
    $fileType = $_FILES['Attach']['type'];

    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);*/
    $content="xxxx";

    //echo (date_create("19/JULY/2017"));

    try
    {

        $stmt = $db_con->prepare("select * from client where clientname=:clientname");
        $stmt->execute(array(":clientname"=>$clientname));
        $count = $stmt->rowCount();

        if($count==0){

            $stmt = $db_con->prepare("INSERT INTO client (CLIENTNAME, PHNO, ADDRESS, CASETYPE, ATTACHMENT, TOTALAMOUNT, PAIDAMOUNT, BALANCEAMOUNT, CASESTAGE, HEARINGDATE,TYPECLIENT) VALUES(:clientname, :clientphno, :clientaddress, :clientcasetype, :content, :clienttotalamount, :clientpaidamount, :clientbalamount, :clientcasestage, :clienthearingdate,:clienttype)");
            $stmt->bindParam(":clientname",$clientname);
            $stmt->bindParam(":clientphno",$clientphno);
            $stmt->bindParam(":clientaddress",$clientaddress);
            $stmt->bindParam(":clientcasetype",$clientcasetype);
            $stmt->bindParam(":clienttotalamount",$clienttotalamount);
            $stmt->bindParam(":clientpaidamount",$clientpaidamount);
            $stmt->bindParam(":clientbalamount",$clientbalamount);
            $stmt->bindParam(":clientcasestage",$clientcasestage);
            $stmt->bindParam(":content",$content);
            $stmt->bindParam(":clienthearingdate",$clienthearingdate);
            $stmt->bindParam(":clienttype",$clienttype);

            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "1"; //  not available
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
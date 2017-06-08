<?php
include "php/dbcon.php";
if (isset($_POST['searchByCityBtn'])) {
    $hospital = $_POST['hospital'];
    $ses=mysql_query("select * from project.hospital a, project.patient b where a.hospitalid = '$hospital' and b.patient_type ='d' and a.hospitalid = b.hospital_id") or die(mysql_error());
   
    //$donors = $db->searchDonorByCity($city);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  

<div align="center" class="container">
  <div align="center" class="jumbotron">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-sm-6"><h2>Search Result</h2> </label>
                        <br><br><br><br>
                        <div class="col-sm-4">
                        <?php
                            while($seos=mysql_fetch_object($ses))
    {
       ?>
       <div class="udet">
      <a href="udetails.php?id=<?= $seos->patient_id; ?>"> <?php echo "$seos->pname<br/>"; ?></a>
        </div>
        <?php
    }
    ?>
                        </div>
                       
                    </div>

                </form>
                </div>
                </div>
                </div>
                </div>
</div>
                </body></html>
                <style>
                .udet{
                	font-size:12px; 
                	margin-bottom:6px;             }
                </style>

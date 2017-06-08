<?php
include "php/dbcon.php";
// Search by Blood Group
if (isset($_POST['searchBtn'])) {
    $bloodGroup = $_POST['b_type'];
    $se=mysql_query("select * from project.bloodgroup where groupid='$bloodGroup'") or die(mysql_error());
    $seo=mysql_fetch_object($se);
    $mgroups =$seo->matching_groups;
    $exg= explode(",",$mgroups);
$chk=mysql_query("select * from project.patient") or die(mysql_error());
while($obs=mysql_fetch_object($chk)){
    for($i=0;$i<=count($exg);$i++){
    $ses=mysql_query("select * from project.bloodgroup where groupid='$exg[$i]'") or die(mysql_error());
    $seos=mysql_fetch_object($ses);echo $exg[$i];exit;
    $mgroups =$seo->matching_groups;
     if(in_array($exg[$i],$seos->groupid,TRUE)){
        echo "P=".$obs->patient_id;
     }else{
echo "nil";
     }
}
}
 exit;  
    //$donors = $db->searchDonorWithBloodGroup($bloodGroup);
}
//Search By City

$title = "Home";
$setHomeActive = "active";
include 'layout/_header.php';
include 'layout/_top_navo.php';
include 'layout/_footer.php';
?>



<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-sm-6">Search for donor with blood group </label>
                        <div class="col-sm-4">
                           <select name="b_type" class="form-control">
                                 <option value="">Select Blood Group</option>
                                <?php
                                   $hospital1 = mysql_query("Select * from project.bloodgroup order by groupid");
                                   while($hobj1=mysql_fetch_object($hospital1)){
                                   ?>
                                    <option value="<?php echo $hobj1->groupid; ?>"><?php echo $hobj1->groupname; ?></option>
                                     <?php
                               }
                                   ?>
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-info btn-sm" name="searchBtn" >Search</button>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal" method="post" action="sresult.php">
                    <div class="form-group">
                         <select name="hospital" class="form-control">
                                   <option value="">Select Hospital</option>
                                   <?php
                                   $hospital = mysql_query("Select * from project.register where usertype='h'");
                                   while($hobj=mysql_fetch_object($hospital)){
                                   ?>
                                   <option value="<?php echo $hobj->userid; ?>"><?php echo $hobj->name; ?></option>
                                   <?php
                               }
                                   ?>
                               </select>
                        <div class="col-sm-2">
                            <button class="btn btn-info btn-sm" name="searchByCityBtn" >Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
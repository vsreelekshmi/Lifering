<?php
include "php/dbcon.php";
if(isset($_POST['submitBtn'])){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $bType = $_POST['b_type'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $hospital = $_POST['hospital'];
    $se1=mysql_query("select * from project.doctors where hospitalid='1'") or die(mysql_error());
    $sobj1=mysql_fetch_object($se1);
    $doctor=$sobj1->doctorid;
    $comments = $_POST['comments'];
    $patient_type ="d";
    $today=date("Y-m-d");
    $liver=$_POST['liver'];
    $kidney=$_POST['kidney'];
    $eyes=$_POST['eyes'];

    if($liver){
        $org="$liver".',';
    }
     if($kidney){
        $org .="$kidney".',';
    }
     if($liver){
        $org .="$eyes".',';
    }
    $ins=mysql_query("insert into project.patient(hospital_id,address,pname,sex,dob,comments,doctor_id,contact_no,organname,bloodgroup_id,patient_type,date_donation) values('$hospital','$address','$name','$sex','$dob','$comments','$doctor','$mobile','$org','$bType','$patient_type','$today')") or die(mysql_error());

    header("location:hhome.php");
   
}

$title = "Donor";
$setDonorActive = "active";
include 'layout/_header.php';

include 'layout/_top_nav.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
            <?php if(isset($success)): ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
            <?php endif; ?>
            <?php if(isset($message)): ?>
            <div class="alert-danger fade-out-5"><?= $message; ?></div>
            <?php endif; ?>
            
            <form method="post" class="form-horizontal" role="form" action="">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Donor Basic Info</h5>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-4">Name</label>
                            <div class="col-sm-3">
                                <input type="text" name="name" placeholder="Name" class="form-control" required="true">
                            </div>
                           </div>
                        <div class="form-group">
                            <label class="col-sm-4">Gender</label>
                            <div class="col-sm-4 radio-inline">
                                <input type="radio" value="male" name="sex" checked="true">Male                         
                            </div>
                            <input type="radio" value="female" name="sex">Female                          

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Blood Type:</label>
                            <div class="col-sm-8"> 
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
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">D.O.B</label>
                            <div class="col-sm-8">
                                <input type="date" name="dob" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Address</label>
                            <div class="col-sm-8">
                                <textarea rows="8" name="address" class="form-control" required="true"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4">Mobile</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" max="10000000000" name="mobile" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Hospital</label>
                            <div class="col-sm-8">
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
                            </div>
                        </div> 
                         <div class="form-group">
                            <label class="col-sm-4">Cause of death</label>
                            <div class="col-sm-8">
                               <textarea name="comments" rows="8"  class="form-control"> </textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-4">Organ</label>
                            <div class="col-sm-8">
                              <input type="checkbox" name="liver" value="liver">&nbsp;Liver<br/>
                              <input type="checkbox" name="kidney" value="kidney">&nbsp;Kidney<br/>
                              <input type="checkbox" name="eyes" value="eyes">&nbsp;Eyes<br/>
                            </div>
                        </div>          
                    </div>
                   <div class="form-group">
                            <label class="col-sm-4"> </label>
                            <div class="col-sm-8">
                                <button class="btn btn-success" name="submitBtn" >Add Donor</button>
                            </div>
                        </div>
                   
                      
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>
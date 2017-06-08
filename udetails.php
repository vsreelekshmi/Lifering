<?php
include "php/dbcon.php";
$id=$_REQUEST['id'];
$chk=mysql_query("select * from project.patient where patient_id='$id'") or die(mysql_error());
$obs=mysql_fetch_object($chk);


$title = "Search Result";
$setDonorActive = "active";
include 'layout/_header.php';

include 'layout/_top_nav.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Search Result</h5>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-4">Name</label>
                            <div class="col-sm-3">
                                <input type="text" name="name" value="<?= $obs->pname; ?>" class="form-control" required="true">
                            </div>
                           </div>
                           <br>
                        <div class="form-group">
                            <label class="col-sm-4">Gender</label>
                            <div class="col-sm-4 radio-inline">
                                <input type="radio" value="male" name="sex" <?php if($obs->sex == 'male'){ ?> checked="true" <?php } ?> >Male                         
                            </div>
                            <input type="radio" value="female" name="sex" <?php if($obs->sex == 'female'){ ?> checked="true" <?php } ?> >Female                          

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
                            <label class="col-sm-4">Comments</label>
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
                   
                      
                    </div>
                </div>
           
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>
    <?php
    if (isset($_POST['submitBtn'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $pin = $_POST['pin'];
        $contactno = $_POST['contactno'];
        $email = $_POST['email']
        $usertype = $_POST['usertype'];
        $hospitaltype = $_POST['hospitaltype'];
        $department = $_POST['department'];
        $organbank = $_POST['organbank'];
        $mobileno = $_POST['mobileno'];
    $usertype = "h";
        require_once 'php/dbcon.php';
         $ins = mysql_query("insert into project.register(name,username,password,email,contactno,city,district,pin,usertype) values('$name','$username','$password','$email','$contactno','$city','$district','$pin','$usertype')") or die(mysql_error());
         $ins1 = mysql_query("insert into project.hospital(hospitaltype,organbankid) values('$hospitaltype','$organbank')") or die(mysql_error());
         $ins2 = mysql_query("insert into project.doctors(hospitalid,name,email,designation,department,phoneno) values('$hospitalid','$dname','$demail','$designation','$department','$phoneno')") or die(mysql_error());
   header("location:hhome.php");
       // $db = new DBConnect();
       // $flag = $db->registerUser($name, $username, $password, $city, $district, $pin, $contactno, $email, $usertype, $hospitaltype, $department, $organbank, $mobileno);
        
      /*  if($flag){
            $success = "Thank You for registering with us.";
        } else {
            $message = "There was some technical error. Try again!"; 
        }*/
    }
    $title = "Join Us";
    $setJoinUsActive = "active";
    include 'layout/_header.php';

    include 'layout/_top_nav.php';
    ?>

    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
            <?php if(isset($success)): ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
            <?php endif; ?>
            <?php if(isset($message)): ?>
            <div class="alert-danger fade-out-5"><?= $message; ?></div>
            <?php endif; ?>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-4">
                        <img src="assets/0lifering.jpg" class="img img-responsive">
                    </div>
                    <p>Join our community and reach out your hands for the others in need. Just by registering below you will make an agreement
                        with us that you are ready to donate and will be available whenever we will need you.</p>               
                </div>
                <div class="panel-body">
                    <form method="post" action="register.php" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 form-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Organisation name" required="true">
                            </div>                      
                    </div>
                    <div class="form-group">
                            <label class="form-label col-md-4">User Name</label>
                            <div class="col-md-8">
                                <input type="text" name="username" class="form-control" required="true">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="form-label col-md-4">Password</label>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" required="true">
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="form-label col-md-4">City</label>
                            <div class="col-md-8">
                                <input type="text" name="city" class="form-control" required="true">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label col-md-4">District</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label col-md-4">Pin Code</label>
                            <div class="col-md-8">
                                <input type="number" required="true" class="form-control" name="pin" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label col-md-4">Phone number</label>
                            <div class="col-md-8">
                                <input type="number" required="true" class="form-control" name="mobile" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="email" required="true" class="form-control" name="email" >
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="form-label col-md-4">Hospital Type</label>
                            <div class="col-md-8">
                             <select name="hospitaltype">
                                      <option value="g">Government</option>
                                      <option value="p">Private</option>
                             </select>
                              <!--  <input type="email" required="true" class="form-control" name="email" >  -->
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <label class="col-md-4 form-label">Doctor in charge</label>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Name" required="true">
                            </div>                      
                    </div>
                    <div class="form-group">
                            <label class="col-md-4 form-label">Department</label>
                            <div class="col-md-4">
                                <input type="text" name="department" class="form-control" required="true">
                            </div>                      
                    </div>
                     <div class="form-group">
                            <label class="col-md-4 form-label">Organ Bank</label>
                            <div class="col-md-4">
                           <!--  <select name="name">
                               <?php 
                                $sql //= mysqli_query($connection, "SELECT name FROM register where usertype=o");
                              //  while ($row = $sql->fetch_assoc()){
                              //  echo "<option value=\"name\">" . $row['name'] . "</option>";
                                  }
                                 ?>
                               </select> -->
                                <input type="text" name="" class="form-control" required="true">-
                            </div> 
                            </div>
                     <div class="form-group">
                            <label class="form-label col-md-4">Mobile number</label>
                            <div class="col-md-8">
                                <input type="number" required="true" class="form-control" name="phoneno" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
  
    <?php include 'layout/_footer.php'; ?>

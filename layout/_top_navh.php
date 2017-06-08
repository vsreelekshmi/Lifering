
<nav class="nav navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo-left-15 pull-left">
                    <div class="h4" id="logo"><a href="index.php">Lifering</a></div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="pull-right">
                    <ul class="nav nav-pills">
                        <li class="<?php
                        if (isset($setHomeActive)) {
                            echo $setHomeActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="hhome.php">Home</a></li>
                      <!--  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Record Type
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="donor.php">Donor</a></li>
          <li><a href="recipient.php">Recipient</a></li>
          
        </ul>
      </li>-->
    <li> <div class="dropdown">
  <button class="dropbtn">Record</button>
  <div class="dropdown-content">
   <a href="donor.php">Donor</a>
    <a href="recipient.php">Recipient</a>
  </div>
</div></li> 
                      
                       <li><a href="request.php">Request</a></li>
                       <li><a href="notifications.php">Notifications</a></li>

                     <!--   <li class="<?php
                        if (isset($setDonorActive)) {
                            echo $setDonorActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="donor.php">New Donor</a></li>
                        
                        <li class="<?php if(isset($setMemberActive)) { echo $setMemberActive; } else { echo ''; } ?>">
                            <a href="members.php">Our Members</a>
                        </li>
                      <!-- <li class="<?php //if(isset($setBloodRequestActive)){ echo $setBloodRequestActive; } else { echo ''; } ?>">
                            <a href="blood_request.php">Blood Requests</a>
                        </li>-->
                        <li><a href="logout.php">Logout</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>


</nav>
        

<style>
/* Style The Dropdown Button */
.dropbtn {
   position: relative;
    display: block;
    padding: 10px 15px;
    background-color: transparent;
        color: #337ab7;
    text-decoration: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
   /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: #337ab7;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
/*.dropdown-content a:hover {background-color: #f1f1f1}*/

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #eee;
}
</style>

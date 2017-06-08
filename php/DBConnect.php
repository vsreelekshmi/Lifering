<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author Vaibhav
 */
class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "root";
    const DB_NAME = "project";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .
            $e->getMessage());
        }
        return $this->db;
    }
    
    public function auth(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: http://localhost/lifering");
        }       
    }
    public function authLogin(){
        session_start();
        if(isset($_SESSION['usertype'])=='o'){
            header("Location: http://localhost/lifering/ohome.php");
        }
        elseif (isset($_SESSION['usertype'])=='h') {
             header("Location: http://localhost/lifering/hhome.php");
        }
    }
    
    public function checkAuth(){
        session_start();
        if(! isset($_SESSION['username'])){
            return false;
        } else {
            return true;
        }
    }


    public function login($username, $password){
        $user=$_REQUEST['username'];
        $pass=$_REQUEST['password'];

        $stmt = $this->db->prepare("SELECT * FROM register WHERE username='$user' AND password='$pass'");
        $stmt->execute([$user,$pass]);
        
        if($stmt->rowCount() > 0){
            session_start();
            $emp = $stmt->fetchAll();
            foreach($emp as $e){
                $_SESSION['userid'] = $e['userid'];
                $_SESSION['username'] = $e['username'];
                $_SESSION['password'] = $e['password'];
                $_SESSION['hospitalname'] = $e['hospitalname'];
                $_SESSION['city'] = $e['city'];
                $_SESSION['district'] = $e['district'];
                $_SESSION['pin'] = $e['pin'];
                $_SESSION['contactno'] = $e['contactno'];
                $_SESSION['usertype'] = $e['usertype'];
                 header("Location: http://localhost/lifering/home.php");
                
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function addDonor($fname,$mname,$lname,$sex,$bType,$dob,$hAddress,$city,$donationDate,$stats,$temp,
            $pulse,$bp,$weight,$hemoglobin,$hbsag,$aids,$malariaSmear,$hematocrit,$mobile,$phone){
        $stmt = $this->db->prepare("INSERT INTO donors (fname,mname,lname,sex,b_type,bday,h_address,city,don_date,stats,temp,pulse,bp,weight,"
                . "hemoglobin,hbsag,aids,malaria_smear,hematocrit,mobile,phone)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname,$mname,$lname,$sex,$bType,$dob,$hAddress,$city,$donationDate,$stats,$temp,$pulse,$bp,$weight,
            $hemoglobin,$hbsag,$aids,$malariaSmear,$hematocrit,$mobile,$phone]);
        return true;
        
    }
    
    public function searchDonorWithBloodGroup($bloodGroup){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE b_type LIKE ?");
        $stmt->execute([$bloodGroup]);
        return $stmt->fetchAll();
    }
    
    public function searchDonorByCity($city){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE city LIKE ?");
        $stmt->execute(["%".$city."%"]);
        return $stmt->fetchAll();
    }
    
    public function logout(){
        session_start();
        session_destroy();
        header("Location: http://localhost/lifering/");
    }
    
    public function getDonorProfileById($id){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    
}

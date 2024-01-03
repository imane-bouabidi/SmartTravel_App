<?php
include_once 'model/config/connexion.php';
include_once 'model/users.php';
    class usersDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID){
            $insert = "INSERT INTO user VALUES(0,'$username', '$password', '$email', '$isActive', '$registrationDate', '$role', '$companyID')";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute();
            // header('Location:index.php?action=horaires');
        }
        
        
        public function getAllUsers(){
            $selectAll = "SELECT * from user";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $usersDATA = array();
            $AllUsers = $stmt->fetchAll();
            foreach($AllUsers as $user){
                $usersDATA[] = new Users($user['userID'],$user['username'],$user['password'],$user['email'],$user['isActive'],$user['registrationDate'],$user['role'],$user['companyID']);
            }
            return $usersDATA;
        }
        public function getUserById($id){
            $selectAll = "SELECT * from user where userID='$id'";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $user = $stmt->fetch();
                $userDATA = new Users($user['userID'],$user['username'],$user['password'],$user['email'],$user['isActive'],$user['registrationDate'],$user['role'],$user['companyID']);
            return $HoraireDATA;
        }
        
        
        public function UpdateUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID){
            $UpdateUser = "UPDATE user set username = '$username', password = '$password', email = '$email', isActive = '$isActive', registrationDate = '$registrationDate', role = '$role', companyID = '$companyID'";
            $stmt = $this->pdo->prepare($UpdateUser);
            $stmt->execute();
            // header('Location:index.php?action=horaires');
        }
        
        
        public function disableUser($userID){
            $disableUser = "UPDATE user set isActive = 0 where userID='$userID'";
            $stmt = $this->pdo->prepare($disableUser);
            $stmt->execute();
            // header('Location:index.php?action=horaires');
        }
    }
?>
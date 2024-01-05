<?php
include_once 'model/config/connexion.php';
include_once 'model/entreprise.php';
    class companyDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }
        
        public function getAllCompanies(){
            $selectAll = "SELECT * from company";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $usersDATA = array();
            $AllCompanies = $stmt->fetchAll();
            foreach($AllCompanies as $Companies){
                $CompaniesDATA[] = new Entreprise($Companies['idEntreprise'],$Companies['name'],$Companies['shortName'],$Companies['image']);
            }
            return $CompaniesDATA;
        }

    }
?>
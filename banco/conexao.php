<?php       

    class Conexao{

        private $host = "localhost";
        private $username = "root";
        private $passwd = "";
        private $dbname = "db_zeradengue";
        private $id;        

        public function __construct(){            
        }

        public function setLastId($mysqli){            
            $this->id = mysqli_insert_id($mysqli);
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function link(){
            $mysqli = new mysqli($this->host, $this->username, $this->passwd, $this->dbname);
            if($mysqli->connect_errno){
                echo "Falha de conexão!: (" .$mysqli->connect_errno. ") " .$mysqli->connect_error; 
            }            
            return $mysqli;
        }
        
        public function selectBanco($selectSql){
            $mysqli = Conexao::link();
            return mysqli_query($mysqli, $selectSql);
        }

        public function insertBanco($insertSql){
            $mysqli = Conexao::link();
            mysqli_query($mysqli, $insertSql);
            Conexao::setLastId($mysqli);           
        }

        public function upDateBanco($upDateSql){
            $mysqli = Conexao::link();
            mysqli_query($mysqli, $upDateSql);
        }

        public function deleteBanco($deleteSql){
            $mysqli = Conexao::link();
            mysqli_query($mysqli, $deleteSql);
        }

        public function close(){
            $mysqli = Conexao::link();
            mysqli_close($mysqli);
        }
    }
    
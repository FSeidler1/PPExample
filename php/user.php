<?php
class Controller {
    private $json;
    private $db;

    // Constructor
    function __construct(){
        // Init DB
        require_once "./mysql.php";
        $this->db = new DB();
        
        // Actions
        if(isset($_GET["action"]) === TRUE) {
            if($_GET["action"] == "islogedin")
            {
                $this->islogedin();
            }
            else if($_GET["action"] == "login")
            {
                $this->login();
            }
            else if($_GET["action"] == "logout")
            {
                $this->logout();
            }
        }
        else
        {
            echo("Diese User Action ist nicht implementiert");
        }
    }

    // Checks if is logged in
    function islogedin() {
        $this->json = $this->db->isUserLoggedin();
    }

    // User Login
    function login() {
        $_POST = json_decode(file_get_contents("php://input"), true);     
        $this->db->login($_POST['benutzer_login'], $_POST['passwort_login']);
        $this->json = $this->db->isUserLoggedin();
    }

    // logout 
    function logout() {
        $this->db->logout();
        $this->json = "true";
    }

    // Display
    public function display(){
        echo $this->json;
    }
}
?>
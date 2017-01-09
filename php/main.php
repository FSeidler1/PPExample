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
            if($_GET["action"] == "add")
            {
                $this->addFoodporn();
            }
            else if($_GET["action"] == "get")
            {
                $this->getFoodporn();
            }
            else if($_GET["action"] == "category")
            {
                $this->filterCategory();
            }
        }
        else
        {
            $this->getAllFoodporns();
        }
    }
    
    // Adds a foodporn to DB
    function addFoodporn() {
        // Convert Json to $_POST
        $_POST = json_decode(file_get_contents("php://input"), true); 
        
        $this->json = $this->db->addFoodporn($_POST["image"], $_POST["title"], $_POST["description"], $_POST["category"]);;
    }    

    // Get One Foodporn by id
    function getFoodporn() {
        // Convert Json to $_POST
        $_POST = json_decode(file_get_contents("php://input"), true);  

        // Create Foodporns Array
        $arrayjson = array();

        // Foodporns
        $foodporns = $this->db->getFoodpornById($_POST["id_foodporn"]);
        foreach($foodporns as $foodporn)
        {
            $arrayFoodporn = array();
            $arrayFoodporn["id_foodporn"] = $foodporn["id_foodporn"];
            $arrayFoodporn["image"] = $foodporn["image"];
            $arrayFoodporn["title"] = $foodporn["title"];
            $arrayFoodporn["description"] = $foodporn["description"];
            $arrayFoodporn["category"] = $foodporn["category"];
            $arrayFoodporn["date"] = $foodporn["dateCreated"];
            $arrayFoodporn["favorit"] = $this->db->isFavoriteFoodporn($foodporn["id_foodporn"]);

            // Users   
            $users = $this->db->getUserById($foodporn["fs_user"]);
            foreach($users as $user)
            {
                $arrayUser = array();
                $arrayUser["id_user"] = $user["id_user"]; 
                $arrayUser["username"] = $user["username"];
                $arrayUser["description"] = $user["description"];
                $arrayUser["image"] = $user["image"];
                $arrayFoodporn["user"] = $arrayUser;
            }

            // Likes
            $arrayFoodporn["likes"] = $this->db->getCountLike($foodporn["id_foodporn"],1);
            $arrayFoodporn["dislikes"] = $this->db->getCountLike($foodporn["id_foodporn"],0);
            

            // Comments
            $comments = $this->db->getCommentsByFoodpornId($foodporn["id_foodporn"]);
            foreach($comments as $comment)
            {
                $arrayComment = array();
                $arrayComment["id_comment"] = $comment["id_comment"]; 
                $arrayComment["content"] = $comment["content"];
                $arrayComment["date"] = $comment["dateCreated"];

                // Users
                $users = $this->db->getUserById($comment["fs_user"]);
                foreach($users as $user)
                {
                    $arrayUser = array();
                    $arrayUser["id_user"] = $user["id_user"]; 
                    $arrayUser["username"] = $user["username"];
                    $arrayUser["description"] = $user["description"];
                    $arrayUser["image"] = $user["image"];
                    $arrayComment["user"] = $arrayUser;
                }

                $arrayFoodporn["comments"] = $arrayComment;
            }

            array_push($arrayjson, $arrayFoodporn);
        }
        $this->json = json_encode($arrayjson);
    }

    // Get All Foodporns
    function getAllFoodporns() {
        // Create Foodporns Array
        $arrayjson = array();

        // Foodporns
        $foodporns = $this->db->getAllFoodporns();
        foreach($foodporns as $foodporn)
        {
            $arrayFoodporn = array();
            $arrayFoodporn["id_foodporn"] = $foodporn["id_foodporn"];
            $arrayFoodporn["image"] = $foodporn["image"];
            $arrayFoodporn["title"] = $foodporn["title"];
            $arrayFoodporn["description"] = $foodporn["description"];
            $arrayFoodporn["category"] = $foodporn["category"];
            $arrayFoodporn["date"] = $foodporn["dateCreated"];
            $arrayFoodporn["favorit"] = $this->db->isFavoriteFoodporn($foodporn["id_foodporn"]);

            // Users   
            $users = $this->db->getUserById($foodporn["fs_user"]);
            foreach($users as $user)
            {
                $arrayUser = array();
                $arrayUser["id_user"] = $user["id_user"]; 
                $arrayUser["username"] = $user["username"];
                $arrayUser["description"] = $user["description"];
                $arrayUser["image"] = $user["image"];
                $arrayFoodporn["user"] = $arrayUser;
            }

            // Likes
            $arrayFoodporn["likes"] = $this->db->getCountLike($foodporn["id_foodporn"],1);
            $arrayFoodporn["dislikes"] = $this->db->getCountLike($foodporn["id_foodporn"],0);
            

            // Comments
            $comments = $this->db->getCommentsByFoodpornId($foodporn["id_foodporn"]);
            foreach($comments as $comment)
            {
                $arrayComment = array();
                $arrayComment["id_comment"] = $comment["id_comment"]; 
                $arrayComment["content"] = $comment["content"];
                $arrayComment["date"] = $comment["dateCreated"];

                // Users
                $users = $this->db->getUserById($comment["fs_user"]);
                foreach($users as $user)
                {
                    $arrayUser = array();
                    $arrayUser["id_user"] = $user["id_user"]; 
                    $arrayUser["username"] = $user["username"];
                    $arrayUser["description"] = $user["description"];
                    $arrayUser["image"] = $user["image"];
                    $arrayComment["user"] = $arrayUser;
                }

                $arrayFoodporn["comments"] = $arrayComment;
            }

            array_push($arrayjson, $arrayFoodporn);
        }
        $this->json = json_encode($arrayjson);
    }

    // filter by Category
    function filterCategory($filter) {
        // Convert Json to $_POST
        $_POST = json_decode(file_get_contents("php://input"), true);  

        // Create Foodporns Array
        $arrayjson = array();

        // Foodporns
        $foodporns = $this->db->getAllFoodpornsByCategory($filter);
        foreach($foodporns as $foodporn)
        {
            $arrayFoodporn = array();
            $arrayFoodporn["id_foodporn"] = $foodporn["id_foodporn"];
            $arrayFoodporn["image"] = $foodporn["image"];
            $arrayFoodporn["title"] = $foodporn["title"];
            $arrayFoodporn["description"] = $foodporn["description"];
            $arrayFoodporn["category"] = $foodporn["category"];
            $arrayFoodporn["date"] = $foodporn["dateCreated"];
            $arrayFoodporn["favorit"] = $this->db->isFavoriteFoodporn($foodporn["id_foodporn"]);

            // Users   
            $users = $this->db->getUserById($foodporn["fs_user"]);
            foreach($users as $user)
            {
                $arrayUser = array();
                $arrayUser["id_user"] = $user["id_user"]; 
                $arrayUser["username"] = $user["username"];
                $arrayUser["description"] = $user["description"];
                $arrayUser["image"] = $user["image"];
                $arrayFoodporn["user"] = $arrayUser;
            }

            // Likes
            $arrayFoodporn["likes"] = $this->db->getCountLike($foodporn["id_foodporn"],1);
            $arrayFoodporn["dislikes"] = $this->db->getCountLike($foodporn["id_foodporn"],0);
            

            // Comments
            $comments = $this->db->getCommentsByFoodpornId($foodporn["id_foodporn"]);
            foreach($comments as $comment)
            {
                $arrayComment = array();
                $arrayComment["id_comment"] = $comment["id_comment"]; 
                $arrayComment["content"] = $comment["content"];
                $arrayComment["date"] = $comment["dateCreated"];

                // Users
                $users = $this->db->getUserById($comment["fs_user"]);
                foreach($users as $user)
                {
                    $arrayUser = array();
                    $arrayUser["id_user"] = $user["id_user"]; 
                    $arrayUser["username"] = $user["username"];
                    $arrayUser["description"] = $user["description"];
                    $arrayUser["image"] = $user["image"];
                    $arrayComment["user"] = $arrayUser;
                }

                $arrayFoodporn["comments"] = $arrayComment;
            }

            array_push($arrayjson, $arrayFoodporn);
        }
        $this->json = json_encode($arrayjson);
    }
}
?>
    
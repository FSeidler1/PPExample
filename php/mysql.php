<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Titel der Einzelseite</title>
    <meta name="description" content="Diese Webseite ist ein Übungsbeispiel und soll ein Einkauflisten-Tool darstellen">
    <meta name="author" content="Fabian Seidler">
    <meta name="keywords" content="Einkauf, Notiz, Zettel, Einkaufsliste, ToDo, AngularJS Beispielprojekt">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- CSS einbinden -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- jQuerry einbinden -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <!-- Bootstrap - Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--einbindung js-->
    <script src="./js/app.js"></script>
    <title>Grocery List</title>
</head>

<body>
    <!-- Default Navbar von Bootstrap -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand" href="#"><img src="./img/headerlogo.png" alt="Grocery List" class="navbar-image" height="38px"></a>
            </div>

            <div class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategorien<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lebensmittel</a></li>
                            <li><a href="#">Trinken</a></li>
                            <li><a href="#">Kleidung</a></li>
                            <li><a href="#">Elektronik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Sonstige</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

</body>

</html>     ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $stmt->execute();


            // Create List Example Entry
            $stmt = self::$_db->prepare("SELECT count(id_list) AS c FROM shoppingdb");
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(1,'Einkauf Party 17.1.2017','Trinken',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(2,'Essen Wochenende','Lebensmittel',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(3,'Alkohohllager','Trinken',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(4,'Sonntagsshoppen Ikea','Sonstige',NOW())");
                $stmt->execute();
            }

            // Create Product Example Entry
            $stmt = self::$_db->prepare("SELECT count(id_product) AS c FROM product");
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(1,'Greygoose Vodka',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(2,'Bacardi Rum',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(3,'Sierra Tequilla',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(4,'Apennzeller Quöllfrisch Bier',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(5,'Fanta',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(5,'Coca Cola',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(6,'Mineral',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(7,'Dr. Oetker Ristorante Salami',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(8,'NongShim Udon Noodle Soup',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(9,'Pringles Paprika',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(10,'Billy Weiss',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(11,'Galant',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO product (id_product,title,dateCreated)
                VALUES(12,'Detolf',NOW())");
                $stmt->execute();
            }

            // Create User Example Entry
            $stmt = self::$_db->prepare("SELECT count(id_user) AS c FROM user");
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO user (id_user,username,firstname,lastname,password,image,session)
                VALUES(1,'test@test.ch', 'Franz', 'Müller', '" . hash("sha512","1234") . "', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Profilbild_Polo_Ocker_Zoom.jpg', '')");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO user (id_user,username,firstname,lastname,password,image,session)
                VALUES(2,'bsp@bsp.ch', 'Hans', 'Dampf', '" . hash("sha512","1234") . "', 'http://wwwhome.math.utwente.nl/~zwarthj/hans3.jpg', '')");
                $stmt->execute();
            }
            
            // Create ListProduct Example Entry
            $stmt = self::$_db->prepare("SELECT count(id_listproduct) AS c FROM listproduct");
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO listproduct (id_listproduct,fk_user,fk_list,fk_produkt,countproduct,dateCreated)
                VALUES(1,1,1,1,2,NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO listproduct (id_listproduct,fk_user,fk_list,fk_produkt,countproduct,dateCreated)
                VALUES(1,1,1,1,2,NOW())");
                $stmt->execute();
            }
            
            

        // Return True if User is logged in
        /*function isUserLoggedin() 
        {
            $stmt = self::$_db->prepare("SELECT count(id_user) AS c FROM user WHERE session=:sid");
            $sid = session_id();
            $stmt->bindParam(":sid", $sid);
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count == 1)
            {
                return "true";
            }
            else if($count < 1)
            {
                return "false";
            }
            else
            {
                return "Error: More then one identical User could be logged in!";
            }
        }*/
        //User ist eingeloggt
        function isUserLoggedin() 
        {
             return "true";
        }













        // Get User By id_user 
        function getUserById(/*$uid*/)
        {
            $stmt = self::$_db->prepare("SELECT u.id_user AS id_user, u.username AS username, u.mail AS mail, u.description AS description, u.image AS image FROM user AS u
                                        WHERE u.id_user=:uid");
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Add Foodporn
        function addFoodporn($img, $title, $descr, $cat)
        {
            $stmt = self::$_db->prepare("INSERT INTO foodporn (image,title,description,category,fs_user,dateCreated)
                                        VALUES(:img, :title, :descr, :cat, :uid, NOW())");
            $stmt->bindParam(":img", $img);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":descr", $descr);
            $stmt->bindParam(":cat", $cat);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return "true";
        }

        // Get ONLY Foodporn Comntext
        function getAllFoodporns()
        {
            $stmt = self::$_db->prepare("SELECT * FROM foodporn");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get Foodporns filtered by category
        function getAllFoodpornsByCategory($cat)
        {
            $stmt = self::$_db->prepare("SELECT * FROM foodporn WHERE category=:cat");
            $stmt->bindParam(":cat", $cat);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get Foodporns filtered by favorites
        function getAllFoodpornsByFavorite()
        {
            $stmt = self::$_db->prepare("SELECT fp.* FROM favorit AS fav LEFT JOIN foodporn AS fp On fav.fs_foodporn = fp.id_foodporn AND fav.fs_user=:uid WHERE id_foodporn IS NOT NULL");
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Gets all History Foodporns
        function getFoodpornsByHostory()
        {
            $stmt = self::$_db->prepare("SELECT * FROM foodporn WHERE fs_user=:uid");
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get Foodporn by id_foodporn
        function getFoodpornById($fid)
        {
            $stmt = self::$_db->prepare("SELECT * FROM foodporn WHERE id_foodporn=:fid");
            $stmt->bindParam(":fid", $fid);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // Set Favorite Foodporn
        function setFavorite($fid)
        {
            if(self::isFavoriteFoodporn($fid) != "true")
            {
                $stmt = self::$_db->prepare("INSERT INTO favorit (fs_foodporn, fs_user) VALUES(:fid, :uid)");
                $stmt->bindParam(":fid", $fid);
                $uid = self::getUserID();
                $stmt->bindParam(":uid", $uid);
                $stmt->execute();
            }
        }

        // Get if the foodporn is favorited
        function isFavoriteFoodporn($fid)
        {
            $stmt = self::$_db->prepare("SELECT count(id_favorit) AS c FROM favorit WHERE fs_foodporn=:fid AND fs_user=:uid");
            $stmt->bindParam(":fid", $fid);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count == 1)
            {
                return "true";
            }
            else
            {
                return "false";
            }
        }
    }
?>
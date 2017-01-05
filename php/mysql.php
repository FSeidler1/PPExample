<?php

class DB 
	{
		private static $_db_username = "root";
		private static $_db_password = "";
		private static $_db_host = "localhost";
		private static $_db_name = "shoppingdb";
		private static $_db;

		function __construct() 
		{
			try 
			{
				self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
			} 
			catch(PDOException $e) 
			{
				die();
			}
        }

        // Initializes Tables & example etrys
        function initDB() 
        {
            // Create List Table
            $stmt = self::$_db->prepare("CREATE TABLE IF NOT EXISTS `shoppingdb`.`list` ( `id_list` INT NOT NULL AUTO_INCREMENT , 
            `title` VARCHAR(255) NOT NULL , 
            `fk_user` INT NOT NULL , 
            `category` VARCHAR(255) NOT NULL ,
            `dateCreated` DATE NOT NULL , 
            PRIMARY KEY (`id_list`)
            ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $stmt->execute();

            // Create User Table
            $stmt = self::$_db->prepare("CREATE TABLE IF NOT EXISTS `shoppingdb`.`user` ( `id_user` INT NOT NULL AUTO_INCREMENT , 
            `username` VARCHAR(255) NOT NULL , 
            `firstname` VARCHAR(255) NOT NULL ,
            `lastname` VARCHAR(255) NOT NULL ,
            `password` VARCHAR(255) NOT NULL , 
            `image` TEXT NOT NULL , 
            `ispremium` INT(2) NOT NULL , 
            `session` TEXT NOT NULL , 
            PRIMARY KEY (`id_user`)
            ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $stmt->execute();

            // Create Product Table
            $stmt = self::$_db->prepare("CREATE TABLE IF NOT EXISTS `shoppingdb`.`product` ( `id_product` INT NOT NULL AUTO_INCREMENT ,
            `title` TEXT NOT NULL , 
            `dateCreated` DATE NOT NULL , 
            PRIMARY KEY (`id_product`)
            ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $stmt->execute();

            // Create ListProduct Table
            $stmt = self::$_db->prepare("CREATE TABLE IF NOT EXISTS `shoppingdb`.`listproduct` ( `id_listproduct` INT NOT NULL AUTO_INCREMENT ,
            `fk_user` INT NOT NULL , 
            `fk_list` INT NOT NULL ,
            `fk_produkt` INT NOT NULL , 
            `countproduct` INT NOT NULL , 
            `dateCreated` DATE NOT NULL , 
            PRIMARY KEY (`id_listproduct`)
            ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $stmt->execute();





            // Create List Example Entry
            $stmt = self::$_db->prepare("SELECT count(id_list) AS c FROM shoppingdb");
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(1,'Einkauf Party 17.1.2017',1,'Trinken',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(2,'Essen Wochenende',1,'Lebensmittel',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(3,'Alkohohllager',1,'Trinken',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(4,'Sonntagsshoppen Ikea',1,'Sonstige',NOW())");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO list (id_list,title,fk_user,category,dateCreated)
                VALUES(5,'Meine Liste',2,'Sonstige',NOW())");
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
                $stmt = self::$_db->prepare("INSERT INTO user (id_user,ispremium,username,firstname,lastname,password,image,session)
                VALUES(1, 1,'test@test.ch', 'Franz', 'Müller', '" . hash("sha512","1234") . "', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Profilbild_Polo_Ocker_Zoom.jpg','')");
                $stmt->execute();
                $stmt = self::$_db->prepare("INSERT INTO user (id_user,ispremium,username,firstname,lastname,password,image,session)
                VALUES(2, 1,'bsp@bsp.ch', 'Hans', 'Dampf', '" . hash("sha512","1234") . "', 'http://wwwhome.math.utwente.nl/~zwarthj/hans3.jpg','')");
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
                VALUES(2,1,1,1,2,NOW())");
                $stmt->execute();
            }
            
            

        }
        
         // Return True if User is logged in
        function isUserLoggedin() 
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
        }

        // Get All Users
        function getAllUsers()
        {
            $stmt = self::$_db->prepare("SELECT u.id_user AS id_user, u.username AS username, u.mail AS mail, u.description AS description, u.image AS image FROM user AS u");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get User By id_user 
        function getUserById($uid)
        {
            $stmt = self::$_db->prepare("SELECT u.id_user AS id_user, u.username AS username, u.mail AS mail, u.description AS description, u.image AS image FROM user AS u
                                        WHERE u.id_user=:uid");
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get User By id_user 
        function getUser()
        {
            $stmt = self::$_db->prepare("SELECT u.id_user AS id_user, u.username AS username, u.mail AS mail, u.description AS description, u.image AS image FROM user AS u
                                        WHERE u.id_user=:uid");
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        // Update User 
        function updateUser($descr, $img)
        {
            $stmt = self::$_db->prepare("UPDATE user SET description=:descr, image=:img WHERE id_user=:uid");
            $stmt->bindParam(":descr", $descr);
            $stmt->bindParam(":img", $img);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
        }

        // Update User Password
        function updateUserPassword($old, $new)
        {
            $old = hash("sha512",$old);
            $new = hash("sha512",$new);
            $stmt = self::$_db->prepare("UPDATE user SET password=:new WHERE id_user=:uid AND password=:old");
            $stmt->bindParam(":new", $new);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->bindParam(":old", $old);
        }

        // Login User
        function login($username ,$password)
        {
            $password = hash("sha512",$password);
            $stmt = self::$_db->prepare("SELECT count(id_user) AS c FROM user WHERE username=:un AND password=:pw");
            $stmt->bindParam(":un", $username);
            $stmt->bindParam(":pw", $password);
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count == 1)
            {
                $stmt = self::$_db->prepare("UPDATE user SET session=:sid WHERE username=:un AND password=:pw");
                $sid = session_id();
                $stmt->bindParam(":sid", $sid);
                $stmt->bindParam(":un", $username);
                $stmt->bindParam(":pw", $password);
                $stmt->execute();
            }
        }

        // Logof User with Session 
        function logout() {
            $stmt = self::$_db->prepare("UPDATE user SET session='' WHERE session=:sid");
            $sid = session_id();
            $stmt->bindParam(":sid", $sid);
            $stmt->execute();
        }

        // Register USer
        function registerUser($username, $mail, $password)
        {
            $password = hash("sha512",$password);
            $stmt = self::$_db->prepare("INSERT INTO user (username,mail,password,session,image)
                VALUES(:username,:mail,:password,:sid,'http://d2sh4fq2xsdeg9.cloudfront.net/application/assets/images/profile-no-photo.png')");
            $sid = session_id();
            $stmt->bindParam("username", $username);
            $stmt->bindParam("mail", $mail);
            $stmt->bindParam("password", $password);
            $stmt->bindParam(":sid", $sid);
            $stmt->execute();
            return "true";
        }

        // Get USer ID
        function getUserID()
        {
            $stmt = self::$_db->prepare("SELECT id_user FROM user WHERE session=:sid");
            $sid = session_id();
            $stmt->bindParam(":sid", $sid);
            $stmt->execute();
            return $stmt->fetch()["id_user"];
        }

        // Add getCountLike
        function addLike($fid, $isLike)
        {
            $stmt = self::$_db->prepare("SELECT count(id_like) AS c FROM likes WHERE fs_foodporn=:fid AND fs_user=:uid");
            $stmt->bindParam(":fid", $fid);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            $count = $stmt->fetch()["c"];
            if($count < 1)
            {
                $stmt = self::$_db->prepare("INSERT INTO likes (islike, fs_user, fs_foodporn) VALUES(:islike,:uid,:fid)");
                $stmt->bindParam(":islike", $isLike);
                $stmt->bindParam(":uid", $uid);
                $stmt->bindParam(":fid", $fid);
                $stmt->execute();
                return "true";
            }
            else
            {
                return "false";
            }
        }

        // Get Likes
        function getCountLike($fid, $isLike)
        {
            $stmt = self::$_db->prepare("SELECT count(id_like) AS c FROM likes WHERE fs_foodporn=:fid AND islike=:islike");
            $stmt->bindParam(":fid", $fid);
            $stmt->bindParam(":islike", $isLike);
            $stmt->execute();
            return $stmt->fetch()["c"];
        }

        // Add Comment
        function addComment($fid, $content)
        {
            $stmt = self::$_db->prepare("INSERT INTO comment (content, dateCreated, fs_foodporn, fs_user) VALUES(:content,NOW(),:fid,:uid)");
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":fid", $fid);
            $uid = self::getUserID();
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
            return "true";
        }

        // Get Comments 
        function getCommentsByFoodpornId($fid)
        {
            $stmt = self::$_db->prepare("SELECT * FROM comment WHERE fs_foodporn=:fid");
            $stmt->bindParam(":fid", $fid);
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











/*

        // Get User By id_user 
        function getUserById($uid)
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
        }*/
    }

?>
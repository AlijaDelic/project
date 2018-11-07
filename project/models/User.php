<?php
require_once('../helpers/ClassLoader.php');

class User
{
    public $role_id;
    public $username;
    public $password;
    public $name;
    public $s_name;
    public $email;

    public function __construct($username, $password, $name, $s_name, $email,$role_id = 2)
    {
        $this->username = $username;
        $this->password = md5($password);
        $this->name = $name;
        $this->s_name = $s_name;
        $this->email = $email;
        $this->role_id = $role_id;
    }

    public static function validation()
    {
        $errors = array();
        if (!isset($_POST)) {
            $msg = "Pls submit";
            array_push($errors, $msg);
        }

        if (isset($_POST['username']) && $_POST['username'] != "") {
            if (strlen($_POST['username']) <= 3) {
                $msg = "Korisnicko ime mora imati vise od 3 slova!";
                array_push($errors, $msg);
            }
            $username = strtolower($_POST['username']);
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("SELECT username FROM users where username LIKE '$username'");
            $sql->execute();
            $count = $sql->rowCount();
            if ($count > 0) {
                $msg = "Korisnicko ime je vec iskoristeno!";
                array_push($errors, $msg);
            }
        } else {
            $msg = "Unesite username!";
            array_push($errors, $msg);
        }

        if (isset($_POST['password']) && isset($_POST['password1'])) {
            if (strlen($_POST['password']) < 4) {
                $msg = "Sifra mora imati vise od 4 znaka!";
                array_push($errors, $msg);

            }
            if ($_POST['password'] != $_POST['password1']) {
                $msg = "Sifre se ne poklapaju!";
                array_push($errors, $msg);
            }
        } else {
            $msg = "Unesite password!";
            array_push($errors, $msg);
        }
        return $errors;
    }

    public static function save()
    {
        $errors = User::validation();

        if (sizeOf($errors) == 0 && sizeOf($_POST) > 0) {

            $user = new User($_POST["username"], $_POST["password"], $_POST["name"], $_POST["s_name"], $_POST["email"]);
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare(
                "INSERT INTO users (username, password, name, s_name, email, role_id) 
                       SELECT '$user->username','$user->password', '$user->name', '$user->s_name', '$user->email', role_id
                       FROM roles WHERE name LIKE 'visitor' LIMIT 1");
            $sql->execute();
        }

        return $errors;
    }

    public static function saveAsAdministrator()
    {
        $errors = User::validation();

        if (sizeOf($errors) == 0 && sizeOf($_POST) > 0) {
            $user = new User($_POST["username"], $_POST["password"], $_POST["name"], $_POST["s_name"], $_POST["email"],$_POST['role_id']);
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare(
                "INSERT INTO users (username, password, name, s_name, email, role_id) 
                       SELECT '$user->username','$user->password', '$user->name', '$user->s_name', '$user->email', $user->role_id; 
                       FROM role WHERE name LIKE '$user->role_id' LIMIT 1");
            $sql->execute();
        }

        return $errors;
    }


    public static function login()
    {
        if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("SELECT * FROM users WHERE username like '$username' AND password like '$password'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                if (!isset($_SESSION['username'])) {
                    $_SESSION['username'] = $username;
                     return header('refresh:1');
                }
            }else{
                $msg = "Provjerite Vase podatke!";
                return $msg;
            }
        }
    }

    public static function getLoggedInUser()
    {
        if (isset($_SESSION['username'])) {
            $arr = array();
            $username = $_SESSION['username'];
            array_push($arr,$username);
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("SELECT * FROM users WHERE username like '$username'");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $role_id = $result[0]['role_id'];
            array_push($arr,$role_id);
            $name = $result[0]['name'];
            array_push($arr,$name);
            $user_id = $result[0]['user_id'];
            array_push($arr,$user_id);
            return $arr;

        }
        return null;
    }

    public static function Logout()
    {
        if (isset($_GET['Odjava']) && $_GET['Odjava'] == "true") {
            unset($_SESSION['username']);
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }
    }
}













<?php
$servername = "localhost";
$username = "root";
$pass = "root";

//connexion à la base de donnée
try{
    $bdd = new PDO("mysql:host={$servername};port=8889;dbname=trt", $username, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection reussie !";
}
catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();
}

//Inscription à la bdd
if(isset($_POST['ok'])){
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recrute = isset($_POST['recrute']) ? 1 : 0;
    $company = $_POST['company'];
    
    if($recrute){
        //si recruteur
        $requeteRecruteur = $bdd->prepare("INSERT INTO recruiter (name, firstname, email, password, company) VALUES (:name, :firstname, :email, :password, :company)");
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $requeteRecruteur->execute(
            array(
                "name" => $name,
                "firstname" => $firstname,
                "email" => $email,
                "password" => $hashedPassword,
                "company" => $company
            )
        );
        var_dump($requeteRecruteur);
    } else {
        //si candidat
        $requeteUser = $bdd->prepare("INSERT INTO user (name, firstname, email, password) VALUES (:name, :firstname, :email, :password)");
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $requeteUser->execute(
            array(
                "name" => $name,
                "firstname" => $firstname,
                "email" => $email,
                "password" => $hashedPassword
            )
        );
    };

    var_dump($requeteUser);
}
?>
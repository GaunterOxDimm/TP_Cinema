<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$erreur = "";
//On appelle la fonction getAll()
$usersDao = new UsersDAO();

if (isset($_POST['submit'])) { // Vérifier si l'utilisateur a appuyé sur le bouton submit (Sign in)
    $login = $_POST['email']; // aaa@a.fr - test
    $pass = $_POST['password'];
    // 123 - test
    if (isset($login) && isset($pass)) { // Checker si les logins et les mots de passes sont renseignés
        $connexion = $usersDao->getAll($login);
        // Récuperer toutes les lignes utilisateurs dans la table user de la bdd
        // print_r($connexion);
        // print_r($connexion[0]->get_email());
        for ($i = 0; $i < count($connexion); $i++) { // Boucler dans le tableau d'objets $connexion
            if ($login == $connexion[$i]->get_email()) { // Vérifier si le login / email entré correspond à un email dans la bdd
                if ($pass != $connexion[$i]->get_password()) { // Vérifier si le mot de passe entré correspond au mot de passe de la bdd
                    $erreur = "Erreur sur le mot de passe";
                    echo $twig->render('users.html.twig', ['erreur' => $erreur]); // erreur s'il ne correspond pas
                } else if ($pass == $connexion[$i]->get_password()) {
                    $_SESSION['login'] = $login;
                    echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]); // Si login et password ok, afficher la page carousel films.html.twig
                    echo $twig->render('search.html.twig', ['login' => $_SESSION['login']]); // Si login et password ok, afficher la page carousel films.html.twig
                    // Si login et password ok, afficher la page carousel films.html.twig
                    // echo $twig->render(['login' => $login]); // Et afficher email dans le header
                }
            } else {
                $erreur = "Erreur sur l'identifiant";
                echo $twig->render('users.html.twig', ['erreur' => $erreur]);
            }
        }
    }
    // $usersNumber = count($connexion); // compte le nombre d'entrées du tableau, càdire le nb d'utilisateurs existants dans la bdd
} else {
    echo $twig->render('users.html.twig');
}

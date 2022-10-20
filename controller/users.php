<?php
var_dump($_SESSION);

if (!isset($_SESSION['login'])) {
    echo $twig->render('users.html.twig');
    if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {

        $erreur = "";
        $usersDao = new UsersDAO();
        // Vérifier si l'utilisateur a appuyé sur le bouton submit (Sign in)
        $login = $_POST['email']; // aaa@a.fr - test
        $pass = $_POST['password'];

        // 123 - test
        // Checker si les logins et les mots de passes sont renseignés
        $connexion = $usersDao->getAll($login); //On appelle la fonction getAll()

        // if (array_key_exists($login, $connexion)) {
        //     if ($connexion[$pass] == $pass) {
        //         $_SESSION['login'] = $login;
        //         echo $twig->render('search.html.twig', ['login' => $_SESSION['login']]);
        //     } else {
        //         $erreur = "Erreur sur le mot de passe";
        //         echo $twig->render('users.html.twig', ['erreur' => $erreur]); // erreur s'il ne correspond pas
        //     }
        // } else {
        //     $erreur = "Erreur sur l'id";
        //     echo $twig->render('users.html.twig', ['erreur' => $erreur]); // erreur s'il ne correspond pas
        // }
        // Récuperer toutes les lignes utilisateurs dans la table user de la bdd
        // print_r($connexion);
        // print_r($connexion[0]->get_email());
        for ($i = 0; $i < count($connexion); $i++) {
            $passSuccess = password_verify($pass, $connexion[$i]->get_password()); // Boucler dans le tableau d'objets $connexion
            if ($login == $connexion[$i]->get_email()) { // Vérifier si le login / email entré correspond à un email dans la bdd
                if ($pass != $passSuccess) { // Vérifier si le mot de passe entré correspond au mot de passe de la bdd
                    $erreur = "Erreur sur le mot de passe";
                    echo $twig->render('users.html.twig', ['erreur' => $erreur]); // erreur s'il ne correspond pas
                } else if ($pass == $passSuccess) {
                    $_SESSION['login'] = $login;
                    header('Location: films');
                }
            }
        }
    }
} else {
    $_SESSION['login'] = $login;
    header('Location: films');
}

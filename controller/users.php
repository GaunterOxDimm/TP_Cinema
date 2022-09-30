<?php


$erreur = "Ça marche pas";
//On appelle la fonction getAll()
$usersDao = new UsersDAO();
$emailing = "";
if (isset($_POST['submit'])) { // Vérifier si l'utilisateur a appuyé sur le bouton submit (Sign in)
    $login = $_POST['email']; // aaa@a.fr - test
    $pass = $_POST['password']; // 123 - test

    if (isset($login) && isset($pass)) { // Checker si les logins et les mots de passes sont renseignés
        $connexion = $usersDao->getAll(); // Récuperer toutes les lignes utilisateurs dans la table user de la bdd
        // print_r($connexion);
        // print_r($connexion[0]->get_email());
        for ($i = 0; $i < count($connexion); $i++) { // Boucler dans le tableau d'objets $connexion
            if ($login == $connexion[$i]->get_email()) { // Vérifier si le login entré correspond à un email dans la bdd
                if ($pass != $connexion[$i]->get_password()) { // Vérifier si le mot de passe entré correspond au mot de passe de la bdd, de la même ligne que email
                    $erreur = "Erreur sur le mot de passe";
                    echo $twig->render('users.html.twig', ['erreur' => $erreur]);
                } else if ($pass == $connexion[$i]->get_password()) {
                    echo $twig->render('films.html.twig'); // Si login et password ok,  afficher la page carousel films.html.twig
                }
            }
        }
    }
    // $usersNumber = count($connexion); // compte le nombre d'entrées du tableau, càdire le nb d'utilisateurs existants dans la bdd
} else {
    echo $twig->render('users.html.twig');
}

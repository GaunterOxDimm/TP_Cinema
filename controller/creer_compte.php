<?php

$userDao = new UsersDAO();

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $login = $_POST['login'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format invalide";
        echo $twig->render('creer_compte.html.twig', ['emailErr' => $emailErr]);
    } else {
        if (strlen($password1) < 3) {
            $passErr = "Mot de passe trop court";
            echo $twig->render('creer_compte.html.twig', ['passErr' => $passErr]);
        } elseif ($password1 != $password2) {
            $passErr = "Les mots de passe ne correspondent pas";
            echo $twig->render('creer_compte.html.twig', ['passErr' => $passErr]);
        } else {
            $newUser = new Users(NULL, $user, $login, $password2);
            $userAdded = $userDao->add($newUser);
            if ($userAdded) {
                $added = "L'utilisateur a bien été ajouté";
                echo $twig->render('search.html.twig', ['added' => $added]);
            } else {
                $addErr = "Probème d'Ajout utilisateur";
                echo $twig->render('creer_compte.html.twig', ['addErr' => $addErr]);
            }
        }
    }
} else {
    echo $twig->render('creer_compte.html.twig');
}

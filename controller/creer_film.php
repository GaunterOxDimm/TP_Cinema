<?php
if (!empty($_SESSION['login'])) {

    if (isset($_POST['button'])) {
        $titreC = $_POST['titre'];
        $realisateurC = $_POST['realisateur'];
        $afficheC = $_POST['affiche'];
        $anneeC = $_POST['annee'];
        $nomC = $_POST['nom'];
        $prenomC = $_POST['prenom'];
        $personnageC = $_POST['personnage'];
        $testC = $_POST['test'];

        if (isset($titreC) && isset($realisateurC) && isset($afficheC) && isset($anneeC) && isset($nomC) && isset($prenomC) && isset($personnageC)) //&& isset($nomC) && isset($prenomC) && isset($idActeurC) && isset($idFilmC) && isset($personnageC) 
        {
            $filmsdao = new FilmsDAO();
            $createFilm = new Films($idFilm = NULL, $titreC, $realisateurC, $afficheC, $anneeC);
            $createActeur = new Acteurs($idActeur = NULL, $nomC, $prenomC);
            $createRole = new Roles($idActeur = NULL, $idFilm = NULL, $personnageC, $idRole = NULL, $testC);
            $status = $filmsdao->add($createFilm, $createActeur, $createRole);
            if ($status) {
                echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
                echo $twig->render('creer_film.html.twig', ['reponse' => "Film Ajouté!"]);
            } else {
                echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
                echo $twig->render('creer_film.html.twig', ['reponse' => "Erreur Ajout Non Éffectué"]);
            }
        }
    } else {
        echo $twig->render('navbar.html.twig', ['login' => $_SESSION['login']]);
        echo $twig->render('creer_film.html.twig');
    }
}

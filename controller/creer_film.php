<?php
if (isset($_POST['button'])) {
    $titreC = $_POST['titre'];
    $realisateurC = $_POST['realisateur'];
    $afficheC = $_POST['affiche'];
    $anneeC = $_POST['annee'];
    $nomC = $_POST['nom'];
    $prenomC = $_POST['prenom'];
    $idActeurC = $_POST['idActeur'];
    $idFilmC = $_POST['idFilm'];
    $personnageC = $_POST['personnage'];
    // $req = 'BEGIN; INSERT INTO films (idFilm, titre, realisateur) VALUES (:idFilmC, :titreC, :realisateurC); INSERT INTO role(idActeur, idFilm, personnage, test) VALUES (:idActeurC, :idFilmC, :personnageC, :testC); INSERT INTO acteurs(idActeur, nom) VALUES (:idActeurC, :); COMMIT;'
    if (isset($titreC) && isset($realisateurC) && isset($afficheC) && isset($anneeC)) //&& isset($nomC) && isset($prenomC) && isset($idActeurC) && isset($idFilmC) && isset($personnageC) 
    {
        $filmsdao = new FilmsDAO();
        $createFilm = new Films(NULL, $titreC, $realisateurC, $afficheC, $anneeC);
        $createActeurs = new Acteurs(NULL, $nomC, $prenomC);
        $createRoles = new Roles($idActeurC, $idFilmC, $personnageC);
        $status = $filmsdao->add($createFilm); // $createActeurs, $createRoles);
        if ($status) {
            echo $twig->render('creer_film.html.twig', ['reponse' => "Film Ajouté!"]);
        } else {
            echo $twig->render('creer_film.html.twig', ['reponse' => "Erreur Ajout Non Éffectué"]);
        }
    }
} else {
    echo $twig->render('creer_film.html.twig');
}

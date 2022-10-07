<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * description of Films
 *
 * @author 1703728
 */
class FilmsDAO extends Dao
{

    //Récupérer toutes les Films
    public function getAll($search)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT DISTINCT * FROM role INNER JOIN films ON role.idFilm = films.idFilm INNER JOIN acteurs ON role.idActeur = acteurs.idActeur WHERE LOWER(films.titre) LIKE :search;");
        // $query = $this->_bdd->prepare("SELECT DISTINCT * FROM role, films, acteurs WHERE role.idFilm = films.idFilm AND role.idActeur = acteurs.idActeur AND LOWER(films.titre) LIKE :search");
        $query->execute(array(':search' => '%' . strtolower($search) . '%'));
        $films = array();
        $roles = array();
        $acteurs = array();

        while ($data = $query->fetch()) {
            $films[] = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
            $roles[] = new Roles($data['idActeur'], $data['idFilm'], $data['personnage'], $data['idRole'],  $data['test']);
            $acteurs[] = new Acteurs($data['idActeur'], $data['nom'], $data['prenom']);
            $jointure = array_merge($films, $roles, $acteurs);
            // var_dump($jointure);
        }
        return ($jointure);
    }

    //Ajouter un film
    public function add($data1, $data2, $data3)
    {
        // ****************************  INSERT FILM ET ACTEUR *************************************

        $valeursFilms = ['titre' => $data1->get_titre(), 'realisateur' => $data1->get_realisateur(), 'affiche' => $data1->get_affiche(), 'annee' => $data1->get_annee()];
        $requeteFilms = "INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:titre, :realisateur, :affiche, :annee)";
        $insertFilms = $this->_bdd->prepare($requeteFilms);

        if (!$insertFilms->execute($valeursFilms)) {
            echo "ERREUR - IMPOSSIBLE D'AJOUTER les films DANS cinema.films";
        } else {
            $valeursActeur = ['nom' => $data2->get_nom(), 'prenom' => $data2->get_prenom()];
            $requeteActeurs = "INSERT INTO acteurs (nom, prenom) VALUES (:nom, :prenom)";
            $insertActeur = $this->_bdd->prepare($requeteActeurs);
            if (!$insertActeur->execute($valeursActeur)) {
                echo "ERREUR - IMPOSSIBLE D'AJOUTER les acteurs DANS cinema.acteurs";
            } else {

                // ***********************  REQUÊTES idActeur *******************************

                $nom = $data2->get_nom();
                $requeteIdActeur = "SELECT idActeur FROM acteurs AS a WHERE a.nom = :nom";
                $queryIdActeur = $this->_bdd->prepare($requeteIdActeur);
                $queryIdActeur->execute(array(':nom' => $nom));
                $newidActeurQuery = array();
                while ($idActeur = $queryIdActeur->fetch()) {
                    $newidActeurQuery[] = new Acteurs($idActeur['idActeur']);

                    //************************  REQUÊTE idFilm  **********************************

                    $titre = $data1->get_titre();
                    $requeteIdFilm = "SELECT idFilm FROM films AS f WHERE f.titre = :titre";
                    $queryIdFilms = $this->_bdd->prepare($requeteIdFilm);
                    $queryIdFilms->execute(array(':titre' => $titre));
                    $newidFilmQuery = array();
                    while ($idFilm = $queryIdFilms->fetch()) {
                        $newidFilmQuery[] = new Films($idFilm['idFilm']);
                        $iDs = array_merge($newidActeurQuery, $newidFilmQuery); //return $iDs; // Retourne un array avec idActeur et idFilm

                        // ****************************  INSERT PERSONNAGE EN FONCTION DES IDs (DANS ROLE)  *************************************

                        $valeursRole = ['idActeur' => $iDs[0]->get_idActeur(), 'idFilm' => $iDs[1]->get_idFilm(), 'personnage' => $data3->get_personnage(), 'test' => $data3->get_test()];
                        $requeteRole = "INSERT INTO role (idActeur, idFilm, personnage, test) VALUES (:idActeur, :idFilm, :personnage, :test)";
                        $insertRole = $this->_bdd->prepare($requeteRole);
                        if (!$insertRole->execute($valeursRole)) {
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        }
    }




    //Récupérer plus d'info sur 1 film

    public function getOne($idFilm)
    {
        if ($idFilm) {
            $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilm = :idFilm');
            $query->execute(array(':idFilm' => $idFilm));
            $data = $query->fetch();
            $film = new Films($data['idFilm'], $data['titre'], $data['realisateur']);
            if (!$data) {
                $film = "Ce film n'existe pas";
            }
        } else {
            $film = "ERROR";
        }
        return $film;
    }

    //supprimer une offre
    public function delete($idFilm)
    {
        $query = $this->_bdd->prepare('DELETE FROM films WHERE films.idFilm = :idFilm');
        $query->execute(array(':idFilm' => $idFilm));
        $data = $query->fetch();
        return ($data);
    }
}

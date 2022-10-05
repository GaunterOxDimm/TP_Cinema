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
    public function add($data)
    {
        $valeursFilms = ['titre' => $data->get_titre(), 'realisateur' => $data->get_realisateur(), 'affiche' => $data->get_affiche(), 'annee' => $data->get_annee()];
        // $valeursActeurs = ['nom' => $data->get_nom(), 'prenom' => $data->get_prenom()];
        // $valeursRoles = ['idActeur' => $data->get_idActeur(), 'idFilm' => $data->get_idFilm(), 'personnage' => $data->get_personnage()];
        $requeteFilms = 'INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:titre , :realisateur, :affiche, :annee)';
        var_dump($requeteFilms);
        // $requeteActeurs = 'INSERT INTO acteurs (nom, prenom) VALUES (:nom , :prenom)';
        // $requeteRoles = 'INSERT INTO role (idActeur, idFilm, personnage) VALUES (:idActeur, :idFilm, :personnage)';
        $insertFilms = $this->_bdd->prepare($requeteFilms);
        // $insertActeurs = $this->_bdd->prepare($requeteActeurs);
        // $insertRoles = $this->_bdd->prepare($requeteRoles);
        if (!$insertFilms->execute($valeursFilms)) {
            print_r($insertFilms->errorInfo());
            return false;
        } else {
            return true;
        }
        // if (!$insertActeurs->execute($valeursActeurs)) {
        //     print_r($insertActeurs->errorInfo());
        //     return false;
        // } else {
        //     return true;
        // }
        // if (!$insertRoles->execute($valeursRoles)) {
        //     print_r($insertRoles->errorInfo());
        //     return false;
        // } else {
        //     return true;
        // }
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

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
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idFilm, titre, realisateur, affiche, annee FROM films");
        $query->execute();
        $films = array();

        while ($data = $query->fetch()) {
            $films[] = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        }
        return ($films);
    }

    //Ajouter une offre
    public function add($data)
    {

        $valeurs = ['titre' => $data->get_titre(), 'realisateur' => $data->get_realisateur()];
        $requete = 'INSERT INTO films (titre, realisateur) VALUES (:titre , :realisateur)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($idFilm)
    {

        $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilm = :idFilm')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idFilm' => $idFilm));
        $data = $query->fetch();
        $film = new Films($data['idFilm'], $data['titre'], $data['realisateur']);
        return ($film);
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

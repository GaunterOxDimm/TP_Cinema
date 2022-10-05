<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * infos of Users
 *
 * @author 1703728
 */
class UsersDAO extends Dao
{

    //Récupérer tous les Users
    public function getAll($search)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idUser, userName, email, password FROM user WHERE user.email = :search");
        $query->execute(array(':search' => $search));
        $user = array();

        while ($data = $query->fetch()) {
            $user[] = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        }
        return ($user);
    }

    //Récupérer plus d'info sur un user
    public function getOne($email)
    {
        $query = $this->_bdd->prepare('SELECT email, password FROM user WHERE user.email = :email');
        $query->execute(array(':email' => $email));
        $user = array();

        $data = $query->fetch();
        if ($data) {
            $user[] = new Users($data['email'], $data['password']);
        } else {
            $user = "requête foirée";
        }
        return ($user);
    }
    //Ajouter un user
    public function add($data)
    {
        // password_hash();
        // password_verify();
        // fonction de hashage avant de mettre dans la base de données
        $valeurs = ['idUser' => $data->get_idUser(), 'userName' => $data->get_userName(), 'email' => $data->get_email(), 'password' => $data->get_password()];
        $requete = 'INSERT INTO user (idUser, userName, email, password) VALUES (:idUser, :userName , :email, :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }


    //supprimer un user
    public function delete($idUser)
    {
        $query = $this->_bdd->prepare('DELETE FROM user WHERE user.idUser = :idUser');
        $query->execute(array(':idUser' => $idUser));
        $data = $query->fetch();

        return ($data);
    }
}

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
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idUser, userName, email, password FROM user");
        $query->execute();
        $user = array();

        while ($data = $query->fetch()) {
            $user[] = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        }
        return ($user);
    }

//Récupérer plus d'info sur un user
    public function getOne($idUser)
    {

        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.idUser = :idUser')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idUser' => $idUser));
        $data = $query->fetch();
        $user = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        return ($user);
    }
    //Ajouter un user
    public function add($data)
    {

        $valeurs = ['userName' => $data->get_userName(), 'email' => $data->get_email ,'password' => $data->get_password()];
        $requete = 'INSERT INTO user (userName, email, password) VALUES (:userName , :email, :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
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

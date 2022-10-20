<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * realisateur of Films
 *
 * @author Vince
 */
class Films
{

    private $_idFilm;
    private $_titre;
    private $_realisateur;
    private $_affiche;
    private $_annee;
    private $_roles = array();
    // faire une méthode addrole() et ajouter une méthode dans le film
    // public function add_role($role)
    // {
    //     $this->_roles[] = $role;
    // }


    public function __construct($idFilm = null, $titre = null, $realisateur = null, $affiche = null, $annee = null)
    {
        if (!is_null($idFilm)) {
            $this->set_idFilm($idFilm);
        }
        $this->set_titre($titre);
        $this->set_realisateur($realisateur);
        $this->set_affiche($affiche);
        $this->set_annee($annee);
        $this->set_roles($roles);
        // $this->set_acteurs($acteurs);
    }
    public function __toString()
    {
        return $this->_idFilm . " " . $this->_titre . " " . $this->_realisateur;
    }
    public function get_titre()
    {
        return $this->_titre;
    }

    public function get_realisateur()
    {
        return $this->_realisateur;
    }

    public function set_titre($_titre)
    {
        $this->_titre = $_titre;
    }

    public function set_realisateur($_realisateur)
    {
        $this->_realisateur = $_realisateur;
    }

    /**
     * Get the value of _idFilm
     */
    public function get_idFilm()
    {
        return $this->_idFilm;
    }

    /**
     * Set the value of _idFilm
     *
     */
    public function set_idFilm($_idFilm)
    {
        $this->_idFilm = $_idFilm;
    }

    /**
     * Get the value of _affiche
     */
    public function get_affiche()
    {
        return $this->_affiche;
    }

    /**
     * Set the value of _affiche
     *
     * @return  self
     */
    public function set_affiche($_affiche)
    {
        $this->_affiche = $_affiche;

        return $this;
    }

    /**
     * Get the value of _annee
     */
    public function get_annee()
    {
        return $this->_annee;
    }

    /**
     * Set the value of _annee
     *
     * @return  self
     */
    public function set_annee($_annee)
    {
        $this->_annee = $_annee;

        return $this;
    }

    // /**
    //  * Get the value of _roles
    //  */
    // public function get_roles()
    // {
    //     return $this->_roles;
    // }

    // /**
    //  * Set the value of _roles
    //  *
    //  * @return  self
    //  */
    // public function set_roles($_roles)
    // {
    //     if ($_roles) {
    //         $this->_roles = new Roles();
    //     }


    //     return $this;
    // }
    // /**
    //  * Get the value of _acteurs
    //  */
    // public function get_acteurs()
    // {
    //     return $this->_acteurs;
    // }

    // /**
    //  * Set the value of _acteurs
    //  *
    //  * @return  self
    //  */
    // public function set_acteurs($_acteurs)
    // {
    //     if ($_acteurs) {
    //         $this->_acteurs = new Acteurs();
    //     }

    //     return $this;
    // }
}

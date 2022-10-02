<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * prenom of Acteurs
 *
 * @author Vince
 */
class Acteurs
{

    private $_idActeur;
    private $_nom;
    private $_prenom;

    public function __construct($idActeur = null, $nom = null, $prenom = null)
    {
        if (!is_null($idActeur)) {
            $this->set_idActeur($idActeur);
        }
        $this->set_nom($nom);
        $this->set_prenom($prenom);
    }
    public function __toString()
    {
        return $this->get_idActeur() . " " . $this->get_nom() . " " . $this->get_prenom();
    }
    public function get_nom()
    {
        return $this->_nom;
    }

    public function get_prenom()
    {
        return $this->_prenom;
    }

    public function set_nom($_nom)
    {
        $this->_nom = $_nom;
    }

    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;
    }

    /**
     * Get the value of _idActeur
     */
    public function get_idActeur()
    {
        return $this->_idActeur;
    }

    /**
     * Set the value of _idActeur
     *
     */
    public function set_idActeur($_idActeur)
    {
        $this->_idActeur = $_idActeur;
    }
}

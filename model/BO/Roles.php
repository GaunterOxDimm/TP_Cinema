<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * test of Roles
 *
 * @author Vince
 */
class Roles
{

    private $_idActeur;
    private $_idFilm;
    private $_personnage;
    private $_idRole;
    private $_test;

    public function __construct($idActeur = NULL, $idFilm = NULL, $personnage = NULL, $idRole = NULL, $test = NULL)
    {

        $this->set_idActeur($idActeur);
        $this->set_idFilm($idFilm);
        $this->set_personnage($personnage);
        if (!is_null($idRole)) {
            $this->set_idRole($idRole);
        }
        $this->set_test($test);
    }
    public function __toString()
    {
        return $this->_idActeur . " " . $this->_idFilm . " " . $this->_personnage  . " " .  $this->_idRole . " " . $this->_test;
    }
    public function get_personnage()
    {
        return $this->_personnage;
    }

    public function get_test()
    {
        return $this->_test;
    }

    public function set_personnage($_personnage)
    {
        $this->_personnage = $_personnage;
        return $this;
    }

    public function set_test($_test)
    {
        $this->_test = $_test;

        return $this;
    }

    /**
     * Get the value of _idRole
     */
    public function get_idRole()
    {
        return $this->_idRole;
    }
    public function get_idActeur()
    {
        return $this->_idActeur;
    }

    /**
     * Set the value of _idRole
     *
     */
    public function set_idRole($_idRole)
    {
        $this->_idRole = $_idRole;

        return $this;
    }

    public function set_idActeur($_idActeur)
    {
        $this->_idActeur = $_idActeur;

        return $this;
    }

    public function set_idFilm($_idFilm)
    {
        $this->_idFilm = $_idFilm;

        return $this;
    }
    public function get_idFilm()
    {
        return $this->_idFilm;
    }
}

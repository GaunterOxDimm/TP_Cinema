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

    private $_idRole;
    private $_personnage;
    private $_test;

    public function __construct($idRole = null, $personnage = null, $test = null)
    {
        if (!is_null($idRole)) {
            $this->set_idRole($idRole);
        }
        $this->set_personnage($personnage);
        $this->set_test($test);
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
    }

    public function set_test($_test)
    {
        $this->_test = $_test;
    }

    /**
     * Get the value of _idRole
     */
    public function get_idRole()
    {
        return $this->_idRole;
    }

    /**
     * Set the value of _idRole
     *
     */
    public function set_idRole($_idRole)
    {
        $this->_idRole = $_idRole;

    }
}

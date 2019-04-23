<?php
    abstract class CATEGORIE_OBJET
    {
        const ARME = 0;
        const ARMURE = 1;
        const POTION = 2;
    }

    class Objet
    {
        protected $_id;
        protected $_nom;
        protected $_poids;
        protected $_valeur;

        protected $_categorie;

        // SET ================================================================

        public function setId( $id )
        {
            $this->_id = $id;
        }

        public function setNom( $nom )
        {
            $this->_nom = $nom;
        }

        public function setPoids( $poids )
        {
            $this->_poids = $poids;
        }

        public function setValeur( $valeur )
        {
            $this->_valeur = $valeur;
        }

        public function setCategorie( $categorie )
        {
            $this->_categorie = $categorie;
        }

        // GET ================================================================

        public function getId()
        {
            return $this->_id;
        }

        public function getNom()
        {
            return $this->_nom;
        }

        public function getPoids()
        {
            return $this->_poids;
        }

        public function getValeur()
        {
            return $this->_valeur;
        }

        public function getCategorie()
        {
            return $this->_categorie;
        }
    }
?>
<?php
    class Effet
    {
        private $_id;
        private $_nom;

        private $_effet;

        // SET ================================================================

        public function setId( $id )
        {
            $this->_id = (int)$id;
        }

        public function setNom( $nom )
        {
            $this->_nom = (string)$nom;
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

        // METHODES ===========================================================
    }
?>
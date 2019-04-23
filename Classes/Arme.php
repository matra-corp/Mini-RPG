<?php
    require_once 'Objet.php';

    abstract class CATEGORIE_ARME
    {
        const EPEE = 0;
        const HACHE = 1;
        const BATON = 2;

        public static function getNom( $int )
        {
            if ( $int == self::EPEE )
            {
                return "Epee";
            }
        }
    }

    class Arme extends Objet
    {
        private $_degatMin;
        private $_degatMax;
        private $_durabilite;
        private $_durabiliteMax;

        private $_categorieArme;

        public function __construct()
        {
            $this->setCategorie( CATEGORIE_OBJET::POTION );
        }

        // SET ================================================================

        public function setDegatMin( $degatMin )
        {
            $this->_degatMin = $degatMin;
        }

        public function setDegatMax( $degatMax )
        {
            $this->_degatMax = $degatMax;
        }

        public function setDurabilite( $durabilite )
        {
            $this->_durabilite = $durabilite;
        }

        public function setDurabiliteMax( $durabilite )
        {
            $this->_durabiliteMax = $durabilite;
        }

        public function setCategorieArme( $categorieArme )
        {
            $this->_categorieArme = $categorieArme;
        }

        // GET ================================================================

        public function getDegatMin()
        {
            return $this->_degatMin;
        }

        public function getDegatMax()
        {
            return $this->_degatMax;
        }

        public function getDurabilite()
        {
            return $this->_durabilite;
        }

        public function getDurabiliteMax()
        {
            return $this->_durabiliteMax;
        }

        public function getCategorieArme()
        {
            return $this->_categorieArme;
        }
    }
?>
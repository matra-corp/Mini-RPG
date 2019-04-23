<?php
    require_once 'Classes/Objet.php';
    require_once 'Classes/Sort.php';

    class Potion extends Objet
    {
        private $_nbUtilisations;
        private $_tabSorts = [];

        public function __construct( array $tabDonnees )
        {
            parent::__construct( $tabDonnees );
            $this->hydrate( $tabDonnees );
        }

        public function hydrate( array $tabDonnees )
        {
            foreach ( $tabDonnees as $key => $value )
            {
                $method = 'set'.ucfirst( $key );

                if ( method_exists( $this, $method ) )
                {
                    $this->$method( $value );
                }
            }
        }

        // SET ================================================================

        public function setNbUtilisations( $nb )
        {
            $this->_nbUtilisations = $nb;
        }

        // GET ================================================================

        public function getNbUtilisations()
        {
            return $this->_nbUtilisations;
        }

        // METHODES ===========================================================

        public function addSort( Sort $sort )
        {
            $this->_tabSorts[] = $sort;
        }
    }
?>
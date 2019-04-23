<?php
    require 'Classes/EffetSort.php';

    class Sort
    {
        private $_id;
        private $_nom;
        private $_coutMP;
        
        private $_tabEffets = [];

        public function __construct( array $tabDonnees )
        {
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

        public function setId( $id )
        {
            $this->_id = $id;
        }

        public function setNom( $nom )
        {
            $this->_nom = (string)$nom;
        }

        public function setCoutMP( $coutMP )
        {
            $this->_coutMP = (int)$coutMP;
        }

        // GET ================================================================

        public function getId()
        {
            return $this->_id;
        }
       
        public function getNom()
        {
            return $this->_;
        }

        public function get()
        {
            return $this->_;
        }

        // METHODES ===========================================================

        public function addEffet( EffetSort $effet )
        {
            $this->_tabEffets[] = $effet;
        }
    }

    $sort1 = new Sort(
        array(
            'nom' => 'Soin',
            'coutMP' => 10
        )
    );
    $sort1->addEffet( $effet1 );
?>
<?php
    abstract class TYPE_EFFET
    {
        const ENDOMMAGER = 0;
        const RESTAURER = 1;
    }

    abstract class CHAMPS_EFFET
    {
        const HP = 0;
        const MP = 1;

        const FORCE = 2;
        const INTELLIGENCE = 3;
        const DEXTERITE = 4;
    }

    abstract class ELEMENT_EFFET
    {
        const FEU = 0;
        const GLACE = 1;
        const FOUDRE = 2;
        const EAU = 3;
        const TERRE = 4;
        const VENT = 5;
        const TENEBRE = 6;
        const LUMIERE = 7;
    }

    class EffetSort
    {
        private $_id;
        private $_nom;

        private $_type;
        private $_champs;
        private $_magnitude;
        private $_duree;
        private $_element;

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
            $this->_id = (int)$id;
        }

        public function setNom( $nom )
        {
            $this->_nom = (string)$nom;
        }

        public function setType( $type )
        {
            $this->_type = (string)$type;
        }

        public function setChamps( $champs )
        {
            $this->_champs = (string)$champs;
        }

        public function setMagnitude( $magnitude )
        {
            $this->_magnitude = (int)$magnitude;
        }

        public function setDuree( $duree )
        {
            $this->_duree = (float)$duree;
        }

        public function setElement( $element )
        {
            $this->_element = (string)$element;
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

        public function getType()
        {
            return $this->_type;
        }

        public function getChamps()
        {
            return $this->_champs;
        }

        public function getMagnitude()
        {
            return $this->_magnitude;
        }

        public function getDuree()
        {
            return $this->_duree;
        }

        public function getElement()
        {
            return $this->_element;
        }

        // METHODES ===========================================================
    }

    $effet1 = new EffetSort( 
        array(
            'nom' => 'restaurer_hp_50',
            'type' => TYPE_EFFET::RESTAURER,
            'champs' => CHAMPS_EFFET::HP,
            'magnitude' => 50,
            'duree' => 0
        )
    );

    $effet2 = new EffetSort( 
        array(
            'nom' => 'endommager_hp_50_feu',
            'type' => TYPE_EFFET::ENDOMMAGER,
            'champs' => CHAMPS_EFFET::HP,
            'magnitude' => 50,
            'duree' => 0,
            'element' => ELEMENT_EFFET::FEU
        )
    );
?>
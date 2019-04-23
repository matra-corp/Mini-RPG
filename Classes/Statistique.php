<?php
    class Statistique
    {
        private $_hp;
        private $_mp;

        private $_force;
        private $_intelligence;
        private $_dexterite;

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

        public function setHp( $hp )
        {
            $this->_hp = $hp;
        }

        public function setMp( $mp )
        {
            $this->_mp = $mp;
        }

        public function setForce( $force )
        {
            $this->_force = $force;
        }

        public function setIntelligence( $intelligence )
        {
            $this->_intelligence = $intelligence;
        }

        public function setDexterite( $dexterite )
        {
            $this->_dexterite = $dexterite;
        }

        // GET ================================================================

        public function getHp()
        {
            return $this->_hp;
        }

        public function getMp()
        {
            return $this->_mp;
        }

        public function getForce()
        {
            return $this->force;
        }

        public function getIntelligence()
        {
            return $this->_intelligence;
        }

        public function getDexterite()
        {
            return $this->_dexterite;
        }

        // METHODS ============================================================

        public function modifierHp( $val )
        {
            $this->setHp( $this->getHp() + $val );
        }

        public function modifierMp( $val )
        {
            $this->setMp( $this->getMp() + $val );
        }

        public function modifierForce( $val )
        {
            $this->setForce( $this->getForce() + $val );
        }

        public function modifierIntelligence( $val )
        {
            $this->setIntelligence( $this->getIntelligence() + $val );
        }

        public function modifierDexterite( $val )
        {
            $this->setDexterite( $this->getDexterite() + $val );
        }
    }
?>
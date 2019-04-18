<?php
    class Personnage
    {
        private $_id = null;
        private $_nom;
        private $_vie;
        private $_degats;
        private $_niveau;
        private $_exp;

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

        public function setVie( $vie )
        {
            $this->_vie = (int)$vie;
        }

        public function setDegats( $degats )
        {
            $this->_degats = (int)$degats;
        }

        public function setNiveau( $niveau )
        {
            $this->_niveau = (int)$niveau;
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

        public function getVie()
        {
            return $this->_vie;
        }

        public function getDegats()
        {
            return $this->_degats;
        }

        public function getNiveau()
        {
            return $this->_niveau;
        }

        // OTHERS =============================================================

        public function presenterPerso()
        {
            echo 'Je m\'appelle '.$this->getNom().'.<br/>';
            echo 'Mon niveau est '.$this->getNiveau().'.<br/>';
            echo 'J\'ai '.$this->getVie().' hp. <br/>';
            echo 'Je fait '.$this->getDegats().' de dégats !<br/>';
        }

        public function modifierHp( $val )
        {
            $this->_hp += $val;
        }

        public function modifierExperience( $val )
        {
            $this->_experience += $val;
        }

        public function modifierNiveau( $val )
        {
            $this->_niveau += $val;
        }

        public function frapper( Personnage $perso )
        {
            $deg = $this->getDegats();
            $messageAttaque = $this->getNom().' frappe '.$perso->getNom().' à main nues et lui inflige '.$deg.' dégats<br />';
            
            $perso->modifierHp( -$deg );
            echo $messageAttaque;
        }

        public function gagnerExperience( $xpGagne = 50 )
        {
            $this->modifierExperience( $xpGagne );
            echo $this->getNom()." à gagné ".$xpGagne." xp<br/>";

            if ( $this->getExperience() % 100 == 0 )
            {
                $this->modifierNiveau( 1 );
                $this->_force += 1;
                $this->_hpMax += 50;
                $this->setHp( $this->getHpMax() );
                echo $this->getNom().' à gagné un niveau !<br />';
            }
        }
    }
?>
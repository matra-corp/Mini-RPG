<?php
    require 'Statistique.php';

    class Personnage
    {
        private $_id;
        private $_nom;
        private $_surnom;
        private $_niveau;
        private $_exp;

        private $_stats;
        private $_statsMax;

        public function __construct( array $tabDonnees )
        {
            $this->hydrate( $tabDonnees );

            if ( array_key_exists( 'statsMax', $tabDonnees ) )
            {
                $this->_statsMax = new Statistique( $tabDonnees['statsMax'] );
            }

            if ( array_key_exists( 'stats', $tabDonnees ) )
            {
                $this->_stats = new Statistique( $tabDonnees['stats'] );
            }
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

        public function setSurnom( $surnom )
        {
            $this->_surnom = (string)$surnom;
        }

        public function setHp( $hp )
        {
            $this->_hp = (int)$hp;
        }

        public function setHpMax( $hp )
        {
            $this->_hpMax = (int)$hp;
        }

        public function setNiveau( $niveau )
        {
            $this->_niveau = (int)$niveau;
        }

        public function setExp( $exp )
        {
            $this->_exp = (int)$exp;
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

        public function getSurnom()
        {
            return $this->_surnom;
        }

        public function getHp()
        {
            return $this->_hp;
        }

        public function getHpMax()
        {
            return $this->_hpMax;
        }

        public function getNiveau()
        {
            return $this->_niveau;
        }

        public function getExp()
        {
            return $this->_exp;
        }

        public function getStats()
        {
            return $this->_stats;
        }

        public function getStatsMax()
        {
            return $this->_statsMax;
        }

        // OTHERS =============================================================

        public function afficherStatut()
        {
            echo
                '<p>'
                .$this->getNom();
            if ( $this->getSurnom() != null )
            {
                echo ' "'.$this->getSurnom().'"';
            }
            echo
                ' HP : '.$this->getStats()->getHp().'/'
                .$this->getStatsMax()->getHp()
                .' MP : '.$this->getStats()->getMp().'/'
                .$this->getStatsMax()->getMp()
                .'</p>';

        }

        public function presenterPerso()
        {
            echo 
                '<p>
                    Je m\'appelle '.$this->getNom().'.<br/>';
            if ( $this->getSurnom() != null )
            {
                echo 
                    'On me surnomme "'.$this->getSurnom().'".<br/>';
            }
            echo
                    'Mon niveau est '.$this->getNiveau().'.<br/>
                    J\'ai '.$this->getStats()->getHp().' hp. <br/>
                </p>';
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
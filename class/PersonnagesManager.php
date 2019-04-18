<?php
    require 'Personnage.php';

    class PersonnagesManager
    {
        private $_bdd;

        public function __construct( $bdd )
        {
            $this->setBdd( $bdd );
        }
        
        // SET ================================================================

        public function setBdd( PDO $bdd )
        {
            $this->_bdd = $bdd;
        }

        // GET ================================================================

        public function get()
        {
            $id = (int) $id;

	        $sql = $this->_bdd->query('SELECT * FROM personnage WHERE id = '.$id);
	        $donnees = $sql->fetch(PDO::FETCH_ASSOC);

	        return new Personnage($donnees);
        }

        public function getList()
        {
            $persos = [];

            $sql = $this->_bdd->query('SELECT * FROM personnage');
    
            while ($donnees = $sql->fetch(PDO::FETCH_ASSOC))
            {
                $persos[] = new Personnage($donnees);
            }
    
            return $persos;
        }

        // OTHERS  ============================================================

        public function add( Personnage $perso )
        {
            if ( $perso->getId() == null )
            {
                $reqAdd = $this->_bdd->prepare('INSERT INTO Personnage(nomPersonnage, viePersonnage, degatsPersonnage, niveauPersonnage) VALUES (:nom, :vie, :degats, :niveau)');

                $reqAdd->bindValue(':nom', $perso->getNom());
                $reqAdd->bindValue(':vie', $perso->getVie(), PDO::PARAM_INT);
                $reqAdd->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
                $reqAdd->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);

                $reqAdd->execute();

                $perso->setId( $this->_bdd->lastInsertId() );

                $reqAdd->closeCursor();

                $_refreshEnabled = true;
            }
        }

        public function delete( Personnage $perso )
        {
            $reqDelete = $this->_bdd->prepare( 'DELETE FROM Personnage WHERE idPersonnage = :id' );
            $reqDelete->bindValue( ':id', $perso->getId(), PDO::PARAM_INT );
            $reqDelete->execute();
            $reqDelete->closeCursor();
        }

        public function deleteById( $id )
        {
            $reqDelete = $this->_bdd->prepare( 'DELETE FROM Personnage WHERE idPersonnage = :id' );
            $reqDelete->bindValue( ':id', $id, PDO::PARAM_INT );
            $reqDelete->execute();
            $reqDelete->closeCursor();
        }

        public function update( Personnage $perso )
        {
            $reqModif = $this->_bdd->prepare('UPDATE Personnage SET nomPersonnage = :nom, viePersonnage = :vie, degatsPersonnage = :degats, niveauPersonnage = :niveau WHERE idPersonnage LIKE :id');

            $reqModif->bindValue( ':id', $perso->getId(), PDO::PARAM_INT );
            $reqModif->bindValue( ':nom', $perso->getNom() );
            $reqModif->bindValue( ':vie', $perso->getVie(), PDO::PARAM_INT );
            $reqModif->bindValue( ':degats', $perso->getDegats(), PDO::PARAM_INT );
            $reqModif->bindValue( ':niveau', $perso->getNiveau(), PDO::PARAM_INT );

            $reqModif->execute();
            $reqModif->closeCursor();
        }
        
    }
?>
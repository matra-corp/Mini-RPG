<?php
    // function chargerClass($classe)
    // {
    //     require 'class/'.$classe.'.php';
    // }

    // spl_autoload_register('chargerClass');

    require 'class/PersonnagesManager.php';

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=PHP_POO;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $persoManager = new PersonnagesManager( $bdd );
    $tabPersos = $persoManager->getList();


    // STATUT =================================================================
    echo '<h3> Statut ! </h3>';

    // Afficher le statut d'un perso selectionné
    if ( isset( $_POST['afficherStatut'] ) )
    {
        $idPerso = htmlspecialchars(explode(" ", $_POST['id'])[0]);

        if ( !empty( $idPerso ) )
        {
            foreach ( $tabPersos as $perso )
            {
                if ( $perso->getId() == $idPerso )
                {
                    echo '<p>';
                    $perso->presenterPerso();
                    echo '<br/></p>';
                }
            }
        }
    }

    // Formulaire pour afficher statut
    echo '
    <form action="'.$_SERVER['PHP_SELF'].'" method="POST" >
        <div class="">
            <label for="id">Selectionnez un personnage : </label>
            <input type="text" id="id" name="id" list="comboNom">
                <datalist id="comboNom">';
                    foreach ($tabPersos as $perso)
                    { 
                        echo '<option value="'.$perso->getId().' : '.$perso->getNom().'" />';
                    }
    echo '
                </datalist>
            <button type="submit" class="" name="afficherStatut"> Afficher statut </button>
        </div>
    </form>';
    

    // COMBAT =================================================================
    echo '<h3> Combat ! </h3>';

    // Afficher le combat
    if ( isset( $_POST['envoiCombat'] ) )
    {
         $idPerso1 = htmlspecialchars(explode(" ", $_POST['idCombat1'])[0]);
         $idPerso2 = htmlspecialchars(explode(" ", $_POST['idCombat2'])[0]);

         if ( !empty( $idPerso1 ) && !empty( $idPerso2 ) )
         {
             if ( $idPerso1 != $idPerso2 )
             {
                // Récuperer les persos
                foreach ( $tabPersos as $perso )
                {
                    if ( $perso->getId() == $idPerso1 )
                    {
                        $perso1 = $perso;
                    }

                    if ( $perso->getId() == $idPerso2 )
                    {
                        $perso2 = $perso;
                    }
                }

                // Afficher le titre du combat
                echo '<h4>'.$perso1->getNom().' VS '.$perso2->getNom().'</h4>';

                // Affichage du combat
                // Qui commence ?
                $int = rand(1, 2);
                var_dump( $int );
                if ( $int == 1 )
                {
                    $combattre = true;
                    while ( $combattre )
                    {
                        // perso1 attaque
                        $perso1->frapper( $perso2 );
                        // perso2 est_il vivant ?

                        // Si perso2 est vivant, il attaque

                        // perso1 est-il vivant

                    }
                }
                else
                {

                }
             }
             else
             {
                 echo '<p style="color: red;"> Un personnage ne peut se combattre lui-même ! </p>';
             }
         }
    }

    // Formulaire pour lancer un combat entre 2 personnages
    echo '
    <form action="'.$_SERVER['PHP_SELF'].'" method="POST" >
        <div class="">
            <label for="idCombat1">Selectionnez personnage 1 : </label>
            <input type="text" id="idCombat1" name="idCombat1" list="comboNom">
                <datalist id="comboNom">';
                    foreach ($tabPersos as $perso)
                    { 
                        echo '<option value="'.$perso->getId().' : '.$perso->getNom().'" />';
                    }
    echo '
                </datalist>
        </div>

        <div class="">
            <label for="idCombat2">Selectionnez personnage 2 : </label>
            <input type="text" id="idCombat2" name="idCombat2" list="comboNom">
                <datalist id="comboNom">';
                    foreach ($tabPersos as $perso)
                    { 
                        echo '<option value="'.$perso->getId().' : '.$perso->getNom().'" />';
                    }
    echo '
                </datalist>
        </div>
    
        <button type="submit" class="" name="envoiCombat"> Commencer le combat ! </button>
    </form>';

    // SMARTY =================================================================

    require ('libs/Smarty.class.php');

    $smarty = new Smarty();

    // Assignation de variables
    $smarty->assign('persoManager', $persoManager);
    // $smarty->assign( array(
    //     'var1' => 'Variable 1',
    //     'var2' => 'Variable 2'
    // ) );

    $smarty->display( 'template/template.html' );


    // $perso = new Personnage( array( 'nom' => 'Georges le butor',
    //                                 'vie' => 1500,
    //                                 'degats' => 500,
    //                                 'niveau' => 36 ) );

    //$persoManager->deleteById( 6 );                                    
    // $perso->setId( 6 );
    // $persoManager->update( $perso );
    // var_dump($perso);

    //$persoManager->add( $perso );
    //var_dump($perso);
    //header('location: class/PersonnagesManager.php');

    // $reqList = $bdd->prepare( 'SELECT idPersonnage AS Id, nomPersonnage AS Nom, viePersonnage AS Vie, degatsPersonnage AS Degats, niveauPersonnage AS Niveau FROM Personnage' );
    // $reqList->execute();
    // $donnees = $reqList->fetchAll(PDO::FETCH_ASSOC);
    // $reqList->closeCursor();

    // var_dump( $donnees );

    //  // Affichage de l'en-tête du tableau
    // echo "<table border=\"1\">";
    // echo "<tr>";
    // foreach ( $donnees[0] as $key => $value )
    // {
    //     echo '<th>'.$key.'</p>';
    // }
    // echo "</tr>";

    //  // Affichage des lignes du tableau
    // foreach ( $donnees as $subTab )
    // {
    //     echo '<tr>';
    //     foreach ( $subTab as $value )
    //     {
    //        echo '<td>'.$value.'</td>';
    //     }
    //     echo '</tr>';
    // }
    // echo "</table>";

    // $tabPersos = [];
    // foreach ( $donnees as $subTab )
    // {
    //     $perso = new Personnage( $subTab );
    //     $tabPersos[$perso->getNom()] = $perso;
    // }

    // //var_dump( $tabPersos );

    // foreach ( $tabPersos as $perso )
    // {
    //     $perso->presenterPerso();
    // }

    //$perso = Personnage(array(null, ''))
?>
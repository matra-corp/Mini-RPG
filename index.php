<?php
    require 'Managers/PersonnagesManager.php';
    require 'Classes/Arme.php';
    require ('Smarty/libs/Smarty.class.php');
    

    $smarty = new Smarty(); // l'instance de smarty

    // // $smarty
    // $smarty->assign('nomPerso', "");

    // // $persoManager
    // try
    // {
    //     $bdd = new PDO('mysql:host=localhost;dbname=PHP_POO;charset=utf8',
    //                    'root',
    //                    'root');
    // }
    // catch (Exception $e)
    // {
    //     die('Erreur : '.$e->getMessage());
    // }

    // $persoManager = new PersonnagesManager( $bdd );
    // // $tapbPersos
    // $tabPersos = $persoManager->getList();

    // TEST ===================================================================

    $perso1 = new Personnage( 
        array(
            'nom' => 'George',
            'surnom' => 'le butor',
            'niveau' => 1,
            'exp' => 1000,
            'statsMax' => array(
                'hp' => 100,
                'mp' => 20,
                'force' => 18,
                'intelligence' => 7,
                'dexterite' => 12
            ),
            'stats' => array(
                'hp' => 100,
                'mp' => 20,
                'force' => 18,
                'intelligence' => 7,
                'dexterite' => 12
            )
        ) 
    );
    $perso1->presenterPerso();
    $perso1->afficherStatut();

    var_dump( $perso1 );
    var_dump( $perso1->getStats()->getIntelligence() );

    $arme1 = new Arme;
    var_dump( $arme1 );

    // SMARTY (post) ==========================================================

    // Assignation de variables
    //$smarty->assign('persoManager', $persoManager);
    // $smarty->assign( array(
    //     'var1' => 'Variable 1',
    //     'var2' => 'Variable 2'
    // ) );

    //$smarty->display( 'template/template.html' );
?>
<?php
/* Smarty version 3.1.33, created on 2019-04-18 14:31:16
  from 'C:\UwAmp\www\Cours PHP POO\Mini-RPG\Mini-RPG\template\template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb88a346049b0_56899253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '479d33b35580bcb5547e4acbcd9371fe4ef488ad' => 
    array (
      0 => 'C:\\UwAmp\\www\\Cours PHP POO\\Mini-RPG\\Mini-RPG\\template\\template.html',
      1 => 1555590603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb88a346049b0_56899253 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP POO Cours 2 : RPG</title>
</head>
<body>

    <form action="script.php" method="POST">
        <label>Nom du nouveau personnage : </label>
        <input type="text" name="nomPerso" />
        <button type="submit" name="creerPerso">Créer</button>
    </form>
</body>
</html><?php }
}

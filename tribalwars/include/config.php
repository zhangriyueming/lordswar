<?php
/*******************************************/
/********* ARQUIVO DE CONFIGURAÇÃO *********/
/********** Versão: Zapping Wars ***********/
/*********** Por Caique Portela ************/
/******* (No jogo: Felipe Medeiros) ********/
/*******************************************/

// Timezone
date_default_timezone_set("Asia/Shanghai");

// Configurações do banco de dados
$config['db_dsn']='mysql:host=tribalwars_db_1;charset=utf8;dbname=tribalwars_main';
$config['db_host'] = 'localhost'; // Host of your Database, probably Localhost
$config['db_user'] = 'root'; // Database Username
$config['db_pw'] = '96kw9o69Q6'; // Database Password
$config['db_name'] = ''; // Database Name

// Acesso master ao painel administrativo
$config['master_user'] = 'Admin';
$config['master_pw'] = 'Zapping1234';

// Configurações especiais...
$config['name'] = '';
$config['ano'] = '2014';
$config['cdn'] = 'global_cdn';
$config['forum'] = '#';
$config['support'] = 'zapping_support/';
$config['version'] = 'V0.1 DEVELOPMENT';
$config['prefix'] = '';

?>
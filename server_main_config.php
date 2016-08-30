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
$config['db_dsn']='mysql:host=lordswar_db_1;charset=utf8;dbname=tribalwars_main';
$config['db_host'] = 'localhost'; // Host of your Database, probably Localhost
$config['db_user'] = 'root'; // Database Username
$config['db_pw'] = '96kw9o69Q6'; // Database Password
$config['db_name'] = ''; // Database Name

$config['lang'] = 'CN';

// Acesso master ao painel administrativo
$config['master_user'] = 'sowicm';
$config['master_pw'] = '12396kw9o69Q6';

// Configurações especiais...
$config['name'] = 'Lordswar';
$config['ano'] = '2016';
$config['cdn'] = 'assets';
$config['forum'] = 'http://forum.lordswar.cn';
$config['forum'] = 'http://104.236.242.31:9999';
$config['support'] = 'zapping_support/';
$config['version'] = 'v0.1';
$config['prefix'] = '';

?>
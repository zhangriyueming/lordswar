<?php
 #########################################
 ### Desenvolvido por: Caique Portella ###
 ###  Email: caiqueportella@gmail.com  ###
 ########  Skype: caique-portela  ########
 ## MSN: caiqueportella@hotmail.com.br  ##
 #########################################
 
/* Configura��es principais: */
$nome = ''; // Nome do jogo
$titulo = ' | Support'; // T�tulo das p�ginas
$forum = 'http://.nl/forum/index.php'; // F�rum do servidor
$ano = '2014'; //Ano de in�cio


// Confiura��o do upload de arquivos:
$upload['file'] = 'uploads/'; // Pasta onde o arquivo vai ser salvo
$upload['size'] = 1024 * 1024 * 2; // Tamanho m�ximo do arquivo (em Bytes) | Padr�o: 1024 * 1024 * 2 (2Mb)
$upload['extension'] = array('jpg', 'png', 'bmp', 'dib', 'gif', 'jpe', 'jpeg', 'jfif', 'tif', 'tiff'); // Array com as extens�es permitidas
$upload['rename'] = true; // Renomear o arquivo? (Se true, o arquivo ser� salvo como: upload_data_hora_userid.extens�o | Se false o nome ir� permanecer)


// Footer links
$config['footer_1'] = '<a href="http://www..nl"" target="_blank">imperalis</a> - ';
/* M�ximo: 10 links */
?>
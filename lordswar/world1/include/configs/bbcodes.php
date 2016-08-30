<?php

function bb_player($var) {
    global $db;

    $var = parse($var[1]);

    $n1 = $db->query_r("SELECT `id`,`username` FROM users WHERE username=:var LIMIT 1", array('var' => $var));
    if ($row = $n1->fetch())
    {
        if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
        return '<a href="game.php?'.$villageid.'screen=info_player&id='.$row['id'].'">'.entparse($row['username']).'</a>';
    } else {
        return entparse($var);
    }
}

function bb_ally($var) {
    global $db;

    $var = parse($var[1]);
    //$var1=str_replace(' ','+',$var);

    $n1 = $db->query_r("SELECT `id`,`short` FROM ally WHERE short=:var LIMIT 1", array('var' => $var));
    if ($row = $n1->fetch())
    {
        if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
        return '<a href="game.php?'.$villageid.'screen=info_ally&id='.$row['id'].'">'.entparse($row['short']).'</a>';
    }
    else {
        return entparse($var);
    }

}

function bb_village($var)
{
    global $db;
    $x = intval($var[1]);
    $y = intval($var[2]);

    $res = $db->query_r("SELECT `id`,`name` FROM villages WHERE x=:x AND y=:y LIMIT 1", array('x' => $x, 'y' => $y));
    if ($row = $res->fetch())
    {
        if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
        return '<a href="game.php?'.$villageid.'screen=info_village&id='.$row['id'].'">'.entparse($row['name']).'</a>';
    } else {
        return "(无效的坐标)";
    }
}

function bb_format($test) {

    $str=$test;

    $simple_search = array(  
                '/\[b\](.*?)\[\/b\]/is',  
                '/\[i\](.*?)\[\/i\]/is',  
                '/\[u\](.*?)\[\/u\]/is',
                '/\[s\](.*?)\[\/s\]/is',  
                '/\[url\=(.*?)\](.*?)\[\/url\]/is',  
                '/\[url\](.*?)\[\/url\]/is',  
                '/\[align\=(left|center|right)\](.*?)\[\/align\]/is',  
                '/\[img\](.*?)\[\/img\]/is',  
                '/\[font\=(.*?)\](.*?)\[\/font\]/is',  
                '/\[size\=(.*?)\](.*?)\[\/size\]/is',  
                '/\[color\=(.*?)\](.*?)\[\/color\]/is',
                '/\[quote\=(.*?)\](.*?)\[\/quote\]/is',
                '/\[spoiler\](.*?)\[\/spoiler\]/is',  
                );  

    $simple_replace = array(  
                '<strong>$1</strong>',  
                '<em>$1</em>',  
                '<u>$1</u>',
                '<s>$1</s>',  
                '<a href="$1" rel="nofollow" title="$2 - $1">$2</a>',  
                '<a href="$1" rel="nofollow" title="$1">$1</a>',  
                '<div style="text-align: $1;">$2</div>',  
                '<img src="$1" alt="" />',  
                '<span style="font-family: $1;">$2</span>',  
                '<span style="font-size: $1;">$2</span>',  
                '<span style="color: $1;">$2</span>',
                '<table class="quote"><tbody><tr><td></td><td class="quote_author">$1 hat folgendes geschrieben:</td></tr><tr><td width="10"></td><td class="quote_message">$2</td></tr></tbody></table>',  
                '<div id="spoiler"><input value="Spoiler" onclick="toggle_spoiler(this)" type="button"><div><span style="display: none;">$1</span></div></div>'
                );  

    $aa = array(  
                '/\[player\](.*?)\[\/player\]/is',  
                );

    $bb = array(  
                '/\[ally\](.*?)\[\/ally\]/is',  
                );


    $cc = array(  
                '/\[village\](.*?)\|(.*?)\[\/village\]/is',  
                );

    $a=preg_replace_callback($aa, "bb_player", $str);
    $b=preg_replace_callback($bb, "bb_ally", $a);
    $c=preg_replace_callback($cc, "bb_village", $b);
    $d=preg_replace($simple_search, $simple_replace, $c);

    return $d;
}


?>
<?php
include ('simple_html_dom.php');

$eastbay_url = 'html/copaMundialWorldSoccer.html';
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
$html = file_get_html($eastbay_url);
$collection1 = $html->find(".sli_products");
 
 //echo $spans[0] . " " . $_POST['searchString'];
 //echo "\n";
// echo "\n";
 $boots = $collection1[0]->find(".contents");

$i = 0;
do {
    $li = $boots[$i];
    $quickviewButton = $li->find('a');
    $link = $quickviewButton[0]->href;
    
    $name = $li->find('div');
    $name = $name[1]->plaintext;
    
    $imgLink = $li->find('img');
    $imgLink = $imgLink[0]->src;
    
    $price = $li->find('.section-price');
    $price = $price[0]->plaintext;
    
    echo "<div class=\"boot\">";
    echo "<div class=\"image\"><img src=\"$imgLink\"/></div>";
    echo "<div class=\"link\"><a href=\"$link\">$name</a></div>";
    echo "<div class=\"price\">" . $price . "</div>";
    echo "</div>";
    
    $i++;
} while ($i < 5);




//echo $link;
//echo $imgLink[1]->src;
//echo $li->plaintext;




//each li
//find quickViewButtonWrap
//get plaintext from quickViewButtonWrap for name
//get href from quickviewButton inside quickViewButtonWrap
//get img src from inside quickViewButtonWrap
//get plain text from product_price for price



// global $players;
// foreach($collection as $player) {  
   
//     $mainPos =  $player->find("th");
//     $mainPos = $mainPos[0]->plaintext;
//     $mainPos = preg_replace('/\s+/', '', $mainPos);

//     $club = $player->find(".playerImage");
//     $club = $club[0]->plaintext;
//     $club = preg_replace('/\(/', '', $club);
//     $club = preg_replace('/\)/', '', $club);
//     $club = preg_replace('/\s+/', '', $club);
    
//     $playerName = $player->find(".player-name");
//     $playerName =  $playerName[0]->plaintext;
//     $pos = strpos($playerName, "[");
    
// } 
?>
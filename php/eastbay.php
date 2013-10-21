<?php
include ('simple_html_dom.php');

$eastbay_url = 'html/copaMundialEastBay.html';
//http://www.eastbay.com/_-_/keyword-copa+mundial
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
$html = file_get_html($eastbay_url);
$collection1 = $html->find("#endeca_search_results");
$searchResultsInfo = $html->find("#searchResultsInfo");
$spans = $searchResultsInfo[0]->find("span");
 
 //echo $spans[0] . " " . $_POST['searchString'];
// echo "<div></div>";

$collection = $collection1[0]->find("li");
$li = $collection[0];

$i = 0;
do {
    $li = $collection[$i];
    $quickviewButton = $li->find('a');

    $link = $quickviewButton[1]->href;

    $name = $li->find("span");
    $name = $name[0]->plaintext;

    $imgLink = $li->find('img');
    $imgLink = $imgLink[1]->src;

    $price = $li->find('.product_price');
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
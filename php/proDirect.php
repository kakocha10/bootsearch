<?php
include ('simple_html_dom.php');

$proDirect_url = 'html/copaMundialProDirect.html';
//http://www.prodirectsoccer.com/Search.aspx?q=copa%20mundial
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
$html = file_get_html($proDirect_url);
$collection1 = $html->find("#MainProductArea");
//  $searchResultsInfo = $html->find("#searchResultsInfo");
//  $spans = $searchResultsInfo[0]->find("span");
//  echo $spans[0] . " jordan retro V fire red";
//  echo "\n";
//  echo "\n";
$collection = $collection1[0]->find(".list_productentity");

$i = 0;
do {
    $li = $collection[$i];
    $quickviewButton = $li->find('a');
    $link = $quickviewButton[0]->href;
    
    $name = $li->find('.list_description');
    $name = $name[0]->plaintext;
    
    $imgLink = $li->find('img');
    $imgLink = $imgLink[0]->src;

    // $productUrl = 'http://www.prodirectsoccer.com' . $link;
    // $producthtml = file_get_html($productUrl);
    // $price = $producthtml->find("#pnlUnitPrice");
    // $price = $price[0]->plaintext;
    
    echo "<div class=\"boot\">";
    echo "<div class=\"image\"><img src=\"$imgLink\"/></div>";
    echo "<div class=\"link\"><a href=\"http://www.prodirectsoccer.com$link\">$name</a></div>";
    echo "<div class=\"price\">price here</div>";
    //echo "<div class=\"price\">" . $price . "</div>";     
    echo "</div>";

    unset($productUrl);
    unset($producthtml);
    unset($firstName);
    $i++;
} while ($i < 5);

?>
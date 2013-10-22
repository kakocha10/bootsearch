<?php
include ('simple_html_dom.php');
$searchText = $_POST['searchString'];
$searchText = preg_replace('/\s+/', '+', $searchText);
echo $searchText;

//$proDirect_url = 'html/copaMundialProDirect.html';
$proDirect_url = 'http://www.prodirectsoccer.com/Search.aspx?q=' . $searchText . '&cur=usd';
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
$html = file_get_html($proDirect_url);
$collection1 = $html->find("#MainProductArea");
//  $searchResultsInfo = $html->find("#searchResultsInfo");
//  $spans = $searchResultsInfo[0]->find("span");
//  echo $spans[0] . " jordan retro V fire red";
//  echo "\n";
//  echo "\n";
$collection = $collection1[0]->find(".list_productentity");

if (sizeof($collection) == 0)
{
    echo "No Results found";
    exit();
}

$i = 0;
do {
    $li = $collection[$i];
    $quickviewButton = $li->find('a');
    $link = $quickviewButton[0]->href;
    
    $name = $li->find('.list_description');
    $name = $name[0]->plaintext;
    
    $imgLink = $li->find('img');
    $imgLink = $imgLink[0]->src;

    $productUrl = 'http://www.prodirectsoccer.com' . $link . '&cur=usd';
    $producthtml = file_get_html($productUrl);
    $price = $producthtml->find("#pnlUnitPrice");
    $price = $price[0]->plaintext;
    if (Holmes::is_mobile() == true)
    {
        echo "<li><a style=\"white-space:normal;\" href=\"http://www.prodirectsoccer.com$link\">$name</a></li>";
    }
    else
    {
        echo "<div class=\"boot\">";
        echo "<div class=\"image\"><img src=\"$imgLink\"/></div>";
        echo "<div class=\"link\"><a href=\"http://www.prodirectsoccer.com$link\">$name</a></div>";
        //echo "<div class=\"price\">price here</div>";
        echo "<div class=\"price\">" . $price . "</div>";     
        echo "</div>";
    }

    unset($productUrl);
    unset($producthtml);
    unset($firstName);
    $i++;
} while ($i < 4 && $i < sizeof($collection));

?>
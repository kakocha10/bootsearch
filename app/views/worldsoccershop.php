<?php
include ('simple_html_dom.php');
$searchText = $_POST['searchString'];
$searchText = preg_replace('/\s+/', '%20', $searchText);
$eastbay_url = 'html/copaMundialWorldSoccer.html';
$worldsoccershop_url = 'http://soccer-gear.worldsoccershop.com/search?w=' . $searchText . '&asug=&ts=ajax';
$html = file_get_html($worldsoccershop_url);
//echo $html
//$collection1 = $html->find(".sli_content");
 
 //echo $spans[0] . " " . $_POST['searchString'];
 //echo "\n";
// echo "\n";
//echo sizeof($collection1);
 $boots = $html->find(".contents");
if (sizeof($boots) == 0)
{
    echo "No Results found";
    exit();
}

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
    if (sizeof($price) == 0)
    {
        $price = $li->find('.section-sale-price');
        $price = $price[0]->plaintext;
    }else
    {
        $price = $price[0]->plaintext;
    }    
    
    if (Holmes::is_mobile() == true)
    {
        echo "<li><a style=\"white-space:normal;\" href=\"$link\">$name $price</a></li>";
    }
    else
    {
        echo "<div class=\"boot\">";
        echo "<div class=\"image\"><img src=\"$imgLink\"/></div>";
        echo "<div class=\"link\"><a href=\"$link\">$name</a></div>";
        echo "<div class=\"price\">" . $price . "</div>";
        echo "</div>";
    }
    
    $i++;

    unset($price);
    unset($li);
} while ($i < 4 && $i < sizeof($boots));

?>
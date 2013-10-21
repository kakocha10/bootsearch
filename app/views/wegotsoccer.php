<?php
include ('simple_html_dom.php');
$wegotsoccer_url = 'html/copaMundialWeGotSoccer.html';
//http://www.wegotsoccer.com/storeitems.aspx?searchword=copa%20mundial
//http://www.wegotsoccer.com/storeitems.aspx?depart=soccer-shoes&searchword=copa%20mundial
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
$html = file_get_html($wegotsoccer_url);
$collection1 = $html->find(".radius");
$results = $collection1[0];
// $searchResultsInfo = $html->find("#searchResultsInfo");
// $spans = $searchResultsInfo[0]->find("span");
 
//  echo $spans[0] . " " . $_POST['searchString'];
//  echo "<div></div>";


$i = 0;
do {
     $bootLink= $results->find('.MainContainerLink');
     $link = $bootLink[$i]->href;

     $name = $bootLink[$i]->find("span");
     $name = $name[0]->plaintext;

     $imgLink = $bootLink[$i]->find('img');
     $imgLink = $imgLink[0]->src;

     $price = $results->find('.c_RegPrice');
     $price = $price[$i]->plaintext;

    if (Holmes::is_mobile() == true)
    {
        echo "<li><a style=\"white-space:normal;\" href=\"$link\">$name $price</a></li>";
    }
    else
    {
        echo "<div class=\"boot\">";
        echo "<div class=\"image\"><img src=\"http://www.wegotsoccer.com$imgLink\"/></div>";
        echo "<div class=\"link\"><a href=\"$link\">$name</a></div>";
        echo "<div class=\"price\">" . $price . "</div>";
        echo "</div>";
    }
    
    $i++;
} while ($i < 5 && $i < sizeof($bootLink));

?>

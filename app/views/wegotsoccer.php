<?php

function get_data($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$searchText = $_POST['searchString'];
$searchText = preg_replace('/\s+/', '+', $searchText);
$searchUrl = 'http://www.wegotsoccer.com/storeitems.aspx?searchword=' . $searchText;
$returned_content = get_data($searchUrl);
//echo $returned_content;
// $homepage = file_get_contents('http://www.example.com/');
// echo $homepage;
include ('simple_html_dom.php');
// $searchText = $_POST['searchString'];
// $searchText = preg_replace('/\s+/', '%20', $searchText);
//$wegotsoccer_url = 'html/copaMundialWeGotSoccer.html';
//$wegotsoccer_url = 'http://www.wegotsoccer.com/storeitems.aspx?ss=predator';
//http://www.wegotsoccer.com/storeitems.aspx?searchword=copa%20mundial
//http://www.wegotsoccer.com/storeitems.aspx?depart=soccer-shoes&searchword=copa%20mundial
//$request_url = 'http://nrlfantasy.dailytelegraph.com.au/statscentre/topplayers?';
 $html = str_get_html($returned_content);
// echo $html;







$collection1 = $html->find(".radius");
//echo sizeof($collection1);
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
} while ($i < 4 && $i < sizeof($bootLink));

?>

<?php
include ('simple_html_dom.php');

//$eastbay_url = 'http://www.eastbay.com/_-_/keyword-copa+mundial';
//$eastbay_url2 = 'http://www.eastbay.com/_-_/keyword-' . $_POST['searchString'];
$searchText = $_POST['searchString'];
$searchText = preg_replace('/\s+/', '+', $searchText);

//$eastbay_url3 = 'http://www.eastbay.com/Shoes/_-_/N-ne/keyword-' . $searchText . '?cm_REF=Shoes';
//$eastbay_url3 = 'http://www.eastbay.com/Shoes/Cleats/_-_/N-neZc3/keyword-' . $searchText . '?cm_REF=Cleats';
//$eastbay_url3 = 'http://www.eastbay.com/Shoes/_-_/N-ne/keyword-' . $searchText . '?Ns=P_TopSalesAmount%7C1&cm_SORT=Best+Sellers';
$eastbay_url3 = 'http://www.eastbay.com/Soccer/Shoes/_-_/N-1e0Zne/keyword-' . $searchText . '?Ns=P_TopSalesAmount%7C1&cm_REF=Shoes';
$html = file_get_html($eastbay_url3);
$collection1 = $html->find("#endeca_search_results");
$searchResultsInfo = $html->find("#searchResultsInfo");

if (sizeof($searchResultsInfo) == 0)
{
    echo "No Results found";
    exit();
}

$spans = $searchResultsInfo[0]->find("span");
 
 echo $spans[0] . " " . $_POST['searchString'];
echo "<div></div>";

 $collection = $collection1[0]->find("li");
 $li = $collection[0];
 
$i = 0;
do {
    $li = $collection[$i];
    //echo $li;
    if ($li->class == 'clearRow')
    {
        $i++;
        continue;
    }
     $quickviewButton = $li->find('a');
     $firstA = $quickviewButton[0];
     $link = $firstA->href;

    // $name = $li->find("span");
     $name = $firstA->plaintext;

     $imgLink = $li->find('img');
     $imgLink = $imgLink[0]->src;

    $price = $li->find('.product_price');
    $price = $price[0]->plaintext;

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
     unset($li);
     unset($quickviewButton);
     unset($firstA);
     unset($link);
     unset($name);
    $i++;
} while ($i < 5 && $i < sizeof($collection));



?>
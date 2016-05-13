<?php

function generateNavLinks($pageNum, $count, $numRowsToShow, $siteToLink, $search){
    
	$back = $pageNum - 1;
	$forward = -1;
	
	if($pageNum < (int)($count / $numRowsToShow)){
		$forward = $pageNum + 1;			
	}
	
	$startTag = "<a href='".$siteToLink."?search=" .$search ."&page=";
    $closeStartTag = "'>";
    $endTag = "</a>";

    $links = "";

    if ($back !== -1){
        $links .= $startTag .$back .$closeStartTag ."Prev" .$endTag;
    }
	
	$links .= "  " .($pageNum + 1) ." of " .((int)($count / $numRowsToShow) + 1) ."  ";
	
    if ($forward !== -1){
        $links .= $startTag .$forward .$closeStartTag ."Next" .$endTag;
    }

    return $links;
}

?>

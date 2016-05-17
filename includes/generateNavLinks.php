<?php

function generateNavLinks($pageNum, $count, $numRowsToShow, $siteToLink, $search){
    
	$back = $pageNum - 1;
	$forward = -1;
	
	if($pageNum < (int)($count / $numRowsToShow)){
		$forward = $pageNum + 1;			
	}
	
	$startTag = "<a href='".$siteToLink."?search=" .$search ."&page=";
    $closeStartTag = ">";
    $endTag = "</a>";

    $links = "";

    if ($back !== -1){
        $links .= $startTag .$back ."' class='prev'" .$closeStartTag ."Prev" .$endTag;
    }
	
	$links .= "Page " .($pageNum + 1) ." of " .((int)($count / $numRowsToShow) + 1);
	
    if ($forward !== -1){
        $links .= $startTag .$forward ."'class='next'" .$closeStartTag ."Next" .$endTag;
    }

    return $links;
}


function generateNavLinksPlayerSearch($pageNum, $count, $numRowsToShow, $siteToLink, $firstName, $lastName){
    
	$back = $pageNum - 1;
	$forward = -1;
	
	if($pageNum < (int)($count / $numRowsToShow)){
		$forward = $pageNum + 1;			
	}
	
	$startTag = "<a href='".$siteToLink."?firstname=" .$firstName ."&lastname=" .$lastName ."&page=";
    $closeStartTag = "'>";
    $endTag = "</a>";

    $links = "";

    if ($back !== -1){
        $links .= $startTag .$back ."' class='prev'" .$closeStartTag ."Prev" .$endTag;
    }
	
	$links .= "  Page " .($pageNum + 1) ." of " .((int)($count / $numRowsToShow) + 1) ."  ";
	
    if ($forward !== -1){
        $links .= $startTag .$forward ."'class='next'" .$closeStartTag ."Next" .$endTag;
    }

    return $links;
}
?>

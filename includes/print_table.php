<?php

function printTable($data){
	$rowCount = count($data);
	$colCount = count($data[0] ) - 1;
	
	$html = "
		<table>
			<tr>
				";
				$arr = $data[0];
				for ($i = 0; $i < $colCount; $i++){
					$html .= "<th>".key($arr)."</th>";
					next($arr);
				}			
	$html .= "		
			</tr>";
	foreach($data as $row){
		$html .= "<tr>";
		for ($i = 0; $i < $colCount; $i++){
			$html .= "<td>".current($row)."</td>";
			next($row);
		}
		$html .= "</tr>";
	}
  $html .= "</table>";
	return $html;

}
?>
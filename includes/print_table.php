<?php

function printTable($data, $page){
	$rowCount = count($data);
	$colCount = count($data[0] ) - 1;
	
	$html = "
		<table>
			<tr><th>   </th>
				";
				$arr = $data[0];
				for ($i = 0; $i < $colCount; $i++){
					$html .= "<th>".key($arr)."</th>";
					next($arr);
				}			
	$html .= "		
			</tr>";
        
    $num = $page * 10 + 1;
	foreach($data as $row){
		$html .= "<tr> <td>" .$num .". " ."</td>";
        $num++;
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
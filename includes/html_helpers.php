<?php

function generateCountrySelects($countryData, $selected){
	$html = "
		<form>
			<fieldset>
				<legend>Select country</legend>
				<div>
					<select name='search'>";
				
	
	$lenght = count($countryData);
	for($i = 1; $i < $lenght; $i++){
	$html .= "<option value='".$countryData[$i] ."'" .(($countryData[$i] === $selected) ? " selected":"") .">" .$countryData[$i] ."</option>";
	}
	
	$html .= "<input class='buttonColor' type='submit' />
				</div>
			</fieldset>
		</form>";
	
	return $html;
}

function generateStatsSelects($data, $selected){
	$colCount = count($data[0] ) - 1;
	$arr = $data[0];
	$keys = array();
	for ($i = 0; $i < $colCount; $i++){
		$keys[$i] = key($arr);
		next($arr);
	}
	
	$html = "
		<form>
			<fieldset>
				<legend>Select sort order</legend>
				<div>
					<select name='search'>";
				
	
	$lenght = count($keys);
	for($i = 4; $i < $lenght; $i++){
		$value = ($keys[$i] === "+/-") ? "plus_minus" : $keys[$i];
		$html .= "<option value='".$value ."'" .(($keys[$i] === $selected) ? " selected":"") .">" .$keys[$i] ."</option>";
	}
	
	$html .= "<input class='buttonColor' type='submit' />
				</div>
			</fieldset>
		</form>";
	
	return $html;
}

?>


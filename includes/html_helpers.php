<?php

function generateCountrySelects($countryData, $selected){
	$html = "
		<form>
			<fieldset>
				<legend>Select country</legend>
				<div>
					<select name='searchBar'>";
				
	
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

?>


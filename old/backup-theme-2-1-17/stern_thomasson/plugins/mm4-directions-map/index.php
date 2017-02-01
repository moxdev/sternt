<div id="map-canvas"></div>
<form id="get-directions">
	<label>Starting Address:
		<input type="text" id="start">
		<input type="hidden" id="end" value="<?php echo $lat . ', ' . $lng; ?>">
	</label>
	<div id="response-panel"></div>
	<input type="submit" value="Get Directions">
</form>
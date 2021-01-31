<?php

function errordisplay($errors) {
	if (count($errors) > 0) {
		echo '<ul class="alert alert-danger">';
		foreach($errors as $error) {
			echo '<li>' . $error . '</li>';
		}
		echo '</ul>';
	}
}

?>
<div class="container">
	<?php
	
		
		echo $_SERVER['HTTP_USER_AGENT'] . "<br/>";
		
		echo date("YmdHis") . "<br/>";
		
		foreach(getallheaders() as $name => $value) {
		
		 echo "$name: $value"."<br/>";
		
		}
		
		echo "pass=\n'" . $_COOKIE['pass'] . "'";

	?> 
</div>

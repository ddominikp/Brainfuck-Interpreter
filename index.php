<?php
echo '<h1>BrainFuck Interpreter</h1>
';
if($_POST){
	require_once("brainfuck.class.php");
	$bf = new brainfuck();
	echo nl2br($bf->parse($_POST['code']));
} else echo '<form action="'.basename($_SERVER['SCRIPT_NAME']).'" method="post">
<textarea name="code" rows="25" cols="70"></textarea><br />
<input type="submit" value="Dawaj!" />
</form>';

?>
<?php
	include_once 'test_webhook.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

	</head>
	
	<body>
	<fieldset>
		<legend> Verify </legend>
		<form method="post" action="">
			<input type="hidden" name="type" value="hook.verify" />
			<p><label>hook id :</label><input type="text" name="hook_id" value="" /></p>
			<p><label>code :</label><input type="text" name="code" /></p>
			<input type="submit" value="verify" />
		</form>
	</fieldset>
	
	<fieldset>
		<legend> Create </legend>
		<form method="post" action="">
			<input type="hidden" name="type" value="item.create" />
			<p><label>item id :</label><input type="text" name="item_id" value="" /></p>
			<input type="submit" value="create" />
		</form>
	</fieldset>
	
	<fieldset>
		<legend> Update </legend>
		<form method="post" action="">
			<input type="hidden" name="type" value="item.update" />
			<p><label>item id :</label><input type="text" name="item_id" value="" /></p>
			<input type="submit" value="create" />
		</form>
	</fieldset>
	
	<fieldset>
		<legend> Delete </legend>
		<form method="post" action="">
			<input type="hidden" name="type" value="item.delete" />
			<p><label>item id :</label><input type="text" name="item_id" value="" /></p>
			<input type="submit" value="delete" />
		</form>
	</fieldset>
	
	</body>
	</html>

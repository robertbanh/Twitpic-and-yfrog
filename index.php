<?php
//
// Author: Robert Banh
// Date: 8/1/2009
//

require_once('config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>What are you viewing?</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>

<div id='header'>
	<img alt='logo' src='logo.png'/>
</div>
<div class='gallery'>
	<h2>Results from Twitpic<a href='<?php echo $q; ?>'><?php echo $q; ?></a></h2>
	<ul>
	<?php if (count($twitpic)==0) echo 'None'; else { foreach ($twitpic as $f) { ?>
		<li><a href='<?php echo $f['url']; ?>'>
			<img alt='<?php echo $f['url']; ?>' src='<?php echo $f['thumb']; ?>'/></a>
		</li>
	<?php } } ?>
	</ul>
</div>
<br class='clear'/>
<div class='gallery'>
	<h2>Results from Yfrog<a href='<?php echo $q; ?>'><?php echo $q; ?></a></h2>
	<ul>
	<?php if (count($yfrog)==0) echo 'None'; else { foreach ($yfrog as $f) { ?>
		<li><a href='<?php echo $f['url']; ?>'>
			<img alt='<?php echo $f['url']; ?>' src='<?php echo $f['thumb']; ?>'/></a>
		</li>
	<?php } } ?>
	</ul>
</div>

</body>
</html>
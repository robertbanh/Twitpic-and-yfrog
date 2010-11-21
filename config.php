<?php
//
// Author: Robert Banh
// Date: 8/1/2009
//
// load library
require_once('twitpic_yfrog.php');

// ================
// Please define your settings here
// ================

// twitter api allows a max of 100 items per page
$maxImages = '50';

// performs a twitter search for twitpic images
$twitpic = twitpic_yfrog::twitter_imageEngine('twitpic', $maxImages, 'twitpic.com', 'twitpic');

// performs a twitter search for yfrog images
$yfrog   = twitpic_yfrog::twitter_imageEngine('yfrog', $maxImages, 'yfrog.com', 'yfrog');

?>
<?php
//
// Author: Robert Banh
// Date: 8/1/2009
//

class twitpic_yfrog
{

	public static function twitter_imageEngine($term, $maxImages, $url, $type)
	{
		$re = array();
		$json = twitpic_yfrog::twitter_search($term, $maxImages);
		//var_export($json);
		foreach ($json->results as $r)
		{
			$tweet = $r->text;
			
			preg_match_all("/http:\/\/$url\/([a-zA-Z0-9]*)/", $tweet, $results);
			twitpic_yfrog::helperLoop($results[1], $type, $re);
		}
		return $re;
	}

	private static function twitter_search($term, $rpp)
	{
		$twitterHost = "http://search.twitter.com/search.json?q=$term&rpp=$rpp";
		$curl = '';
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:')); 
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_URL, $twitterHost);

		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}

	// helper function that will loop through data and create key/value results
	private static function helperLoop($data, $type, &$results)
	{
		if (!is_array($data) || count($data) == 0)
			return;
		
		foreach ($data as $id)
		{
			if ($id != '')
			{
				switch ($type)
				{
					case 'twitpic':
						$thumb = "http://twitpic.com/show/thumb/$id";
						$url = "http://twitpic.com/$id";
						$results[] = array(
							'thumb' => $thumb,
							'url' => $url
							);
						break;
					case 'yfrog':
						$thumb = "http://yfrog.com/$id".".th.jpg";
						$url = "http://yfrog.com/$id";
						$results[] = array(
							'thumb' => $thumb,
							'url' => $url
							);
						break;
				}
			}
		}
	}
	
}

?>
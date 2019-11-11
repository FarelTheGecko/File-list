<h2>File list</h2>
<br>
<br>
<?php

$sort=	$_GET['sort'];

if ($sort==1) $method='filemtime';
elseif ($sort==2) $method='basename';
else $method='filemtime';

$Body = '';

$i = 0;

$col1='col-xs-1 col-sm-1 	col-md-1 col-lg-1';
$col2='col-xs-2 col-sm-2 	col-md-1 col-lg-1';
$col3='col-xs-2 col-sm-4 	col-md-4 col-lg-3';
$col4='col-xs-6 col-sm-4 	col-md-4 col-lg-3';
$col5='col-xs-1 col-sm-1 	col-md-1 col-lg-1';
$col6='			col-sm-12 	col-md-1 col-lg-3';
$col7='';
$col8='';

echo "<div class='row'>
	<div class='$col1 '><strong>#</strong></div>
	<div class='$col2 '><strong>Filetype</strong></div>
	<div class='$col3 '><strong><a href='proj05.htm?sort=1'>Last Modified</a></strong></div>
	<div class='$col4 '><strong><a href='proj05.htm?sort=2'>Filename</strong></a></div>
	<div class='$col5 '><strong>Open</strong></div>
	<div class='$col6'>		</div>
</div>
<hr>
";

$dir = "proj05/";
chdir($dir);


array_multisort(array_map($method, ($files = glob("*.*"))), SORT_ASC, $files);


foreach($files as $filename){
      if(!is_dir($filename) ){
         $i++; 
		 $filetype=strtoupper (substr($filename, -3));
		 $filename2= substr(basename($filename)	, 0, -4);
		 $modified=date ("F d Y H:i:s", filemtime($filename));
		 if (
		 ($filetype=="AVI") ||
		 ($filetype=="FLV") ||
		 ($filetype=="WMV") ||
		 ($filetype=="MOV") ||
		 ($filetype=="MP4"))
		 $icon="&#9658;";
		 else $icon ="&#9670;";	
         $Body .= "
<div class='row'>
	<div class='$col1 '>	$i	</div>
	<div class='$col2 '>	$filetype	</div>
	<div class='$col3 '>	$modified	</div>
	<div class='$col4 '>	$filename2	</div>
	<div class='$col5 '>	<a href='$dir$file' target='_blank'>$icon</a>	</div>
	<div class='$col6 '>		</div>
</div>		 
";
      } 
} 


echo $Body; 
?>
<?php
// this will give us access to all of the WP functions
// really weird that people would move the wp-content folder (but whatever)
// now i have to find the wp-blog-header.php
if (file_exists('../../../wp-blog-header.php')) { // normal location
	require_once('../../../wp-blog-header.php');
} elseif (file_exists('../../wp-blog-header.php')) {
	require_once('../../wp-blog-header.php');
} elseif (file_exists('../wp-blog-header.php')) { // should never be here
	require_once('../wp-blog-header.php');
} elseif (file_exists('../../../../wp-blog-header.php')) { // even further in
	require_once('../../../../wp-blog-header.php');
} elseif (file_exists('../../../../../wp-blog-header.php')) { // even further in
	require_once('../../../../../wp-blog-header.php');
} elseif (file_exists('../../../../../../wp-blog-header.php')) { // even further in
	require_once('../../../../../../wp-blog-header.php');
} else {
	echo 'Unable to locate the CMS.  "Forced Download" can not function without the CMS libraries.<br />';
	echo 'Chances are you moved where wp-content resides.  This can be fixed manually.  Contact the plugin developer for help.';
	exit();
}

// get everything past wp-content (including wp-content)
// had to pass the variable via URL because the upload dir can always change
$path = $_GET['path'];
$path = preg_replace('/^.*wp-content/', '', $path);

$filename = $_GET['file'];

$location = WP_CONTENT_DIR . $path . $filename;

// making the file exists, if not, break
if (!file_exists($location)) {
	echo 'File Not Found.';
} else {
	$length = filesize($location);
	$file_ext = strtolower(substr(strrchr($filename,"."),1));

	// thanks aaron dugan for this (aarondugan.com)
	//This will set the Content-Type to the appropriate setting for the file
	switch($file_ext) {
		case "pdf": $file_type = "application/pdf"; break;
		case "exe": $file_type = "application/octet-stream"; break;
		case "zip": $file_type = "application/zip"; break;
		case "doc": $file_type = "application/msword"; break;
		case "xls": $file_type = "application/vnd.ms-excel"; break;
		case "ppt": $file_type = "application/vnd.ms-powerpoint"; break;
		case "gif": $file_type = "application/gif"; break;
		case "png": $file_type = "application/png"; break;
		case "jpeg": $file_type = "application/jpg"; break;
		case "jpg": $file_type = "application/jpg"; break;
		case "mp3": $file_type = "application/mpeg"; break;
		case "wav": $file_type = "application/x-wav"; break;
		case "mpeg": $file_type = "application/mpeg"; break;
		case "mpg": $file_type = "application/mpeg"; break;
		case "mpe": $file_type = "application/mpeg"; break;
		case "mov": $file_type = "application/quicktime"; break;
		case "avi": $file_type = "application/x-msvideo"; break;

	  // don't allow these
		case "php":
		case "htm":
		case "html":
		case "txt": die("<b>Cannot be used for ". $file_ext ." files!</b>"); break;

		default: $file_type = "application/force-download";
	}

	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Type: $file_type");

	//Force the download
	$header="Content-Disposition: attachment; filename=".$filename.";";
	header($header);
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$length);

	// pulling the file and shooting it to the browser
	readfile($location);
}

?>
jQuery(document).ready(function(){

	jQuery('a.forced-download').each(function() {
		var link = jQuery(this).attr("href");
		var dir = jQuery.url.setUrl(link).attr("directory");
		var file = jQuery.url.setUrl(link).attr("file");
		var host = jQuery.url.setUrl(link).attr("host");

		//var fdl comes from the page's <head>, enqueued in index.php of this plugin
		jQuery(this).attr('href', fdl + 'download.php' + "?path=" + dir + "&file=" + file);
	});

});
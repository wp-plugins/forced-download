=== Forced Download ===
Contributors: Aaron Reimann
Donate link: http://sideways8.com/donate
Tags: download, force, forced
Requires at least: 3.0
Tested up to: 3.1.1
Stable 1.0.4

This forces a download (vs. show up in your browser) for any "a href" that has the class "forced-download".

== Description ==
Force a user to download a file instead of them being opened in a browser.  For example, a .mov would not open in the browser, it will ask you to save it.  All you have to do is change the &lt;a href=""&gt; to be in the class "forced-download". So simply add class="forced-download" to the link and you are good to go.


== Installation ==

Unzip and upload the plugin into the plugins directory and then activate it.  Once it is active, you can change a "a href" from:

&lt;a href="mysite.lan/wp-content/uploads/something.jpg"&gt;Download my picture&lt;/a&gt;
to
&lt;a href="mysite.lan/wp-content/uploads/something.jpg" class="forced-download"&gt;Download my picture&lt;/a&gt;

Then the user will be prompted to download it, instead of it being displayed in the browser.
This should work with: pdf,doc,xls,ppt,gif,png,jpg,mp3,wav,mpg,mov,avi, etc.


== Frequently Asked Questions ==

Why can't I get this to work?<br />
Chances are you moved where wp-content resides.  I have tried to modify my plugin to find the file 'wp-blog-header.php' in the root of your WordPress install.  There is a file in the plugin called download.php.  Because this plugin directly calls download.php, it really needs to know where WordPress is.
<br />
<br />
Why am I getting a '404 Error' or 'File Not Found' error?<br />
Because some hosting is a little more strict, and some security plugins stop you from accessing download.php directly, you will get this error.  I am more than willing to help you, you still can get this to work but you will have to tweak the plugin.<br />


== What browsers does this work in? ==

Honestly, I don't know.  I tested some basic browsers like IE7, IE8, Firefox 3.6 and Chrome 8.


== How do I get support? ==

Easily, ask.  I'll do my best to fix if there is a bug.  If it is a feature request I will see what I can do, but I can't make promises.


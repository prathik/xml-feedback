Short-Feedback
==============

Get feedback from users on your website on any page/post using shortcode. No load on database either!

Supports multiple files, you can have different feedback section for different pages.

Requirements
------------

* Tested on Wordpress 3.0+

* SimpleXml for PHP

License
-------

Free to use, copy, modify and distribute. GPL2.

Installation
------------

Run `git clone https://github.com/prathik/Short-Feedback.git` in your Wordpress plugins folder.

Configuration and Usage
-----------------------

**Rename default.xml.sample as default.xml.**

Give write permissions to the folder where the plugin files are present. Use the shortcode `[[feedback file="default.xml"]]` on any Wordpress post/page to get a form where the user can enter the feedback.

Feedback can be stored on multiple files. Copy the default.xml.sample file with a different name and enter that filename in the shortcode. Example `[[feedback file="homepage.xml"]]`.

The feedback can be checked in the feedback tab in admin dashboard of Wordpress.

Updating
--------

Go to the plugin directory and run `git pull`.

History
-------

This plugin was created to get feedback from users in a website and it is stored in an xml file for easy movement of data and intelligent mining of user needs.

Author
------

Prathik Raj (prathikraj<at>ymail<dot>com)

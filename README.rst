==================================================
Wacon Cookie Management(WCM)
==================================================

.. image:: Documentation/Images/wcm_screenshot1.jpg
   :alt: Wacon Cookie Management(WCM)

WCM is a typo3 extension that enables website visitors to control and manage the usage of cookies on the website(commonly known as "cookie consent box"). Thus it helps website owner to be in line with the rules of the General Data Protection Regulation (GDPR) which took effect on 25 May 2018.

Minimal Dependencies
====================
* TYPO3 CMS 10.4 or 11.5 for Wacon Cookie Management(WCM) 3.x
* TYPO3 CMS 9.5 or 10.4 for Wacon Cookie Management(WCM) 2.x
* TYPO3 CMS 7.6 or 9.5 for Wacon Cookie Management(WCM) 1.x


Quick Install Guide
===================

Installation & Configuration
--------------------------------------------

1. Download the extension wacon_cookie-management from the TYPO3 Repository or gitHub. Install the extension and activate it with the extension manager.

2. Include the template "Wacon Cookie Management" in your root template

Cookies
------------------------------

1. Create a folder in your page tree (e.g. "cookies")
2. Switch to the list module and add a new record (Wacon Cookie Management -> Cookie) for each used cookie
3. Fill out the fields according for each cookie

Include plugin
----------------------------------

1. Create a "plugin"-content element "Cookie Freigabe"
As this content element is responsible for the first pop-up & represents the button to open the cookie consent box, make sure it is part of the main template, e.g. by including it in the footer.

2. Configure the plugin
* force pop-up for first visitors (e.g. due to tracking code)
* link to the imprint page
* link to the legal notice page
* the cookie folder


Include external scripts
----------------------------------

Each external script that is used by the website and is responsible for a cookie you defined in your cookie folder has to be encapsulated with the plugin "Externes Script einbinden":
1. Create a plugin content element "Externes Script einbinden"
2. Define the needed cookie
3. Define the JavaScript-Code that is proposed to be added to the page if this cookie is enabled
4. If you wish to show disabled elements (e.g. represented by a frosted glas effect) like googleMaps, Twitter Time etc. you can define an appropriate image and a short text(e.g. "click here to enable me")

License
-------

This project is released under the terms of the `MIT license <https://en.wikipedia.org/wiki/MIT_License>`_.

Find more information on our website
-------

https://www.wacon.de/typo3-service/eigene-extensions/wacon-cookie-management.html
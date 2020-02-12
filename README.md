![](https://www.wacon.de/fileadmin/template/img/wacon_logo.svg)
# Wacon Cookie Management(WCM)
WCM is a typo3 extension that enables website visitors to control and manage the usage of cookies on the website(commonly known as "cookie consent box"). Thus it helps website owner to be in line with the rules of the General Data Protection Regulation (GDPR) which took effect on 25 May 2018.


## Compatibility
TYPO3 version  | compatibility
------------- | -------------
v10  |  coming soon
v9  | yes
v8 | yes
v7 | yes

## Installation & Configuration
1. Download the extension wacon_cookie-management from the TYPO3 Repository or gitHub. Install the extension and activate it with the extension manager.

2. Include the template "Wacon Cookie Management" in your root template

## Cookies 
1. Create a folder in your page tree(e.g. "cookies")
2. Switch to the list module and add a new record(Wacon Cookie Management -> Cookie) in thus folder
3. Fill out the fields according to the used cookie

## Include plugin
1. Create a "plugin"-content element "Cookie Freigabe"
As this content element is responsible for the first pop-up & represents the button to open the cookie consent box, make sure it is part of the main template, e.g. by including it in the footer.

2. Configure the plugin
2.1 Force Pop-Up for first visitors (e.g. due to tracking code, )
2.2 Link to the imprint page
2.3 Link to the legal notice page
2.4 The cookie folder

## Include external scripts
Each external script that is used by the website and is responsible for a cookie you defined in your cookie folder has to be encapsulated with the plugin "Externes Script einbinden":
1. Create a plugin content element "Externes Script einbinden"
2. Define the needed cookie
3. Define the JavaScript-Code that is proposed to be added to the page if this cookie is enabled
4. If you wish to show disabled element(e.g. represented by a frosted glas effect) like googleMaps, Twitter Time etc. you can define an appropriate image and a short text(e.g. "click here to enable me")

## License
The extension is licensed unter the GNU General Public License v2

## More information
[Find more information on our website](https://www.wacon.de/typo3-service/eigene-extensions/wacon-cookie-management.html "information about the TYPO3 Extension wacon_cookie_management")

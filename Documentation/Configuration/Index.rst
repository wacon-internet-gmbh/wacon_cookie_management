.. include:: ../Includes.txt

.. _configuration:

=============
Configuration
=============

Loading of jQuery
===============

This extensions loads its own jQuery file. You can disable it by adding the following TypoScript inside your
`constants.typoscript` or by editing the constants inside the constant editor in the Template module.

.. code-block:: typoscript
    plugin.tx_waconcookiemanagement_cookiefreigabe.settings.includeJQuery = 0

Define your cookies
===============

Create a new folder for your cookies (here "WCM").

Set the folder in TypoScript inside your
`constants.typoscript` or by editing the constants inside the constant editor in the Template module.

.. code-block:: typoscript
    plugin.tx_waconcookiemanagement_cookiefreigabe.settings.cookieStorage = {your pid}

Go to the list module an create a "Cookie" record for each cookie you use on your website


.. figure:: ../Images/wcm_screenshot8.jpg
   :class: with-shadow
   :alt: New Cookie record
   :width: 300px

	Define new cookie
	
Fill out the fields as accurate as possible

.. figure:: ../Images/wcm_screenshot7.jpg
   :class: with-shadow
   :alt: Cookie information
   :width: 500px

	Fields of a Cookie record

Edit Cookie information when needed

.. figure:: ../Images/wcm_screenshot6.jpg
   :class: with-shadow
   :alt: Edit Cookie information
   :width: 500px

	Edit Cookie information
	


Adding links inside bodytext for displaying the cookie consent box
==================================================================

In Rich Text Editors you can make some settings inside your `.yaml` file so that you can insert links to the
cookie consent box inside any bodytext.

Put the following configuration inside your `.yaml` file for your RTE.
For example, it could be located inside `Configuration/RTE/Default.yaml` but this depends on your sitepackage/exension::

    editor:
        config:
            stylesSet:
                - { name: "Cookie Set", element: "p", attributes: { 'class': 'cookie-set' } }

With this settings, you get an extra dropdown item inside the Style-dropdown list.
This example surrounds the `<p>`-Tag with an extra class `cookie-set`. f.e.: `<p class="cookie-set">Cookie settings</p>`

.. figure:: ../Images/Configuration/style-dropdown-configuration.png
   :alt: Style dropdown example

   Example of the dropdown.


.. important::
    You can use any other solution for adding this class to your text. It is only important, that the element must have
    the class `cookie-set`.

    For example you can use a `<span>`-Tag like `<span class="cookie-set">Cookies</span>`.

    Be aware that you might need other settings than explained here.


Define folder for scripts in <head>-Tag
=======================================

Create a new folder for your scripts you want to include in the <head>.

Set the folder in TypoScript inside your
`constants.typoscript` or by editing the constants inside the constant editor in the Template module.

.. code-block:: typoscript
    plugin.tx_waconcookiemanagement_cookiefreigabe.settings.headerScriptStorage = {your pid}


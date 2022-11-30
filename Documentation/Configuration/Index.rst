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

Limit the amount of days, the cookie consents will be stored inside the database
================================================================================

You can now set how long user consent is stored in the database.
This can help to keep the database-tables as small as possible.

This setting is available inside TypoScript

.. code-block:: typoscript
    plugin.tx_waconcookiemanagement_cookiefreigabe.settings.statisticsDays = 30

.. info::
    This is by default set to 365 days.

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

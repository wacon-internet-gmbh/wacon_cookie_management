# Wacon Cookie Management
WCM ist eine TYPO3 Extension, die es den Besuchern Ihrer Website erlaubt, die benutzten Cookie-Einstellungen selber zu kontrollieren.

## Kompatibilität
* Typo3 V10 - **Bald verfügbar**
* Typo3 V9.X - **Kompatibel**
* Typo3 V8.X - **Kompatibel**
* Typo3 V7.6.32 - **Bedingt kompatibel**

## Installation & Konfiguration
1. Laden Sie sich die WCM Extension aus der Repository herunter, installieren Sie die Extension und aktivieren Sie diese in Ihrem Extension Manager
2. Binden Sie das Template "Wacon Cookie Management" in Ihr Seitentemplate ein

## Cookies anlegen
1. Erstellen Sie einen Ordner im Seitenbaum
2. Wechseln Sie im angelegten Ordner auf die Listenansicht und fügen Sie einen neuen Datensatz hinzu (Wacon Cookie Management -> Cookie)
3. Füllen Sie die benötigten Felder Ihren Cookies entsprechend aus, die Sie auf der Seite nutzen und speichern Sie Ihre Einstellungen (Erklärungen der einzelnen Eingabefeldern finden Sie im Wiki)

## WCM Script einbinden
1. Erstellen Sie ein Content-Element Plugin auf einer Seite oder einem Teil der Seite, die immer beim Aufruf Ihrer Website mitgeladen wird und wählen Sie das Plugin "Cookie Freigabe" aus
2. Wechseln Sie nun in den Reiter "Plugin" und füllen Sie die Eingabefelder aus und wählen Sie unter "Datensatzsammlung" Ihren Cookie Ordner aus, den Sie vorher angelegt haben


## Externe Scripte einbinden
1. Erstellen Sie ein Content-Element Plugin auf einer Seite oder einem Teil der Seite, die immer beim Aufruf Ihrer Website mitgeladen wird und wählen Sie das Plugin "Externes Script einbinden" aus
2. Wählen Sie den benötigten Cookie aus, der später aktiviert werden muss um den Script zu aktivieren
3. Fügen Sie nun den Script ein, den Sie durch das Cookie aktivieren möchten
4. (optional) Wenn es sich um ein Content-Element handelt, das der Benutzer auch sieht (z.B. Twitter Timeline), können Sie auch einen Text und ein Bild anzeigen lassen, welches stattdessen dort zu sehen ist

## Lizenz
Diese Extension ist eine Erweiterung des Content Management System TYPO3 und unterliegt der GNU GPL Version 2.

## Weitere Infos
[Weitere Informationen auf unserer Homepage](https://www.wacon.de/typo3-service/eigene-extensions/wacon-cookie-management.html "Informationen zu unserer TYPO3 Extension wacon_cookie_management")

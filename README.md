
# Lansuite - Webbased LAN-Party Management System
-----------------------------------------------

Lansuite ist ein Lanparty-Administrationssystem, basierend auf PHP und MySQL.
Es greift den Organisatoren von Lanparties in vielen Bereichen wie Turnierorganistation, Anmeldung oder Nachrichtenverwaltung unter die Arme und erm�glicht so, dass sich die Organisatoren auf die wesentlichen Dinge Ihrer Party konzentieren k�nnen.

Auch f�r die Partybesucher bietet Lansuite eine Vielzahl von M�glichkeiten, am wichtigsten d�rften hier die Kommunikationskomponenten von Lansuite, wie der ICQ-�hnliche Messenger und die Boards sein, aber auch die M�glichkeit sich �ber aktuelle Geschehnisse in den News zu Informieren, sowie den aktuellen Stand der Turniere zu sehen.

In den Turnierbereichen von Lansuite k�nnen die G�ste bequem ihre Spielergebnisse melden und mit dem integrierten Sitzplan behalten sowohl Organisatoren als auch G�ste immer den vollen �berblick �ber die Lanparty.

Lansuite ist vollst�ndig Lansurfer-kompatibel und unterst�tzt die Austragung von WWCL-, NGL- und LGZ-Turnieren.

Durch die Verwendung von PHP/MySQL kann Lansuite auf jedem beliebigen System, auf dem ein aktueller Browser installiert ist, benutzt werden, sowie mit fast allen Hosting-Angeboten, die Scriptsprache und Datenbank anbieten im Internet betrieben werden.

Serverseitig k�nnen sowohl Linux/Unix- als auch Windows- und Mac-Systeme eingesetzt werden.


## Dies sind die Ziele auf die bei der Entwicklung von Lansuite besonders geachtet wird:

- Einfache Bedienung, Benutzerfreundlichkeit mit m�glichst einfachen Abl�ufen

Dieses Ziel stellt die gr��te Ver�nderung zu Lansuite Version 1 da. Viele der Konzepte wurden �ber Bord geworfen, da deren Bedienung zu komplex war. So wurde z.B. das Turniersystem radikal ver�ndert und von unn�tigem Ballast befreit. Die einfache Bedienbarkeit und das Learning-by-doing sind wichtige Entwicklungsziele der Version 2. Auch die "unterschwellige" und "leise" Unterst�tzung des Benutzers war uns wichtig, so sind z.B. alle Tabellen sortierbar usw.

- M�chtiges Verwaltungswerkzeug f�r die Organisatoren, das dennoch �bersichtlich und einfach zu bedienen ist

"Nehmt die Orgas an die Hand und gebt ihnen Sicherheit, denn sie haben schon genug zu tun". Getreu diesem Motto wurden die Verwaltungswerkzeuge von Lansuite entwickelt. Da wir selbst Erfahrung im Organisieren von Lanparties haben, wissen wir wo es Probleme gibt und wie kritische Situationen (Anmeldung) gel�st werden k�nnen. Lansuite versucht eben diese Situation so einfach wie m�glich zu gestalten, insbesondere beim Einchecken der G�ste zu Beginn der Party.

- Auswahl zwischen unterschiedlichen Designs, m�glichst einfache Anpassung/Erstellung von Designs durch Organisatoren

Das optische Erscheinungsbild von Lansuite kann komplett ge�ndert werden. Mit Lansuite werden mehrere Designs geliefert, zwischen denen der User w�hlen kann. Wir haben uns f�r ein Template-Konzept entschieden, da damit die Organisatoren recht einfach eigene Designs erstellen, oder die Standarddesigns anpassen k�nnen. Eine Dokumenation dazu ist ebenfalls enthalten.

- Erh�hung der Sicherheit

Wenn der Webserver es unterst�tzt, was wir ausdr�cklich empfehlen, arbeitet Lansuite komplett SSL-verschl�sselt. Durch einige Sicherheitskonzepte im Session-Tracking ist ein Session-Hijacking und somit das Ergaunern von Passw�rtern auch ohne SSL-Support fast unm�glich. Zusammen mit SSL haben Hacker / Cracker kaum Chancen Passw�rter zu knacken. Auch in der Lansuite-Datenbank werden sensible Daten nur verschl�sselt gespeichert.

- Kleine Hilfebuttons (Helpletts) die zu fast jeder Situation eine on-line Hilfe bieten

Lansuite bietet zu vielen Fachw�rtern kleine Popup-Fenster mit deren Erkl�rung an. Dieses Prinzip wird konseqent angewendet und beantwortet so die meisten Fragen. Zu wichtigen Bereichen ist au�erdem eine Onlinehilfe verf�gbar.

- Gute, ausf�hrliche Dokumentation

Sollten Onlinehilfe und Helpletts nicht weiterhelfen, kann der Anwender im Wiki bl�ttern. F�r die Organisatoren und Entwickler gibt es dort sehr n�tzliche Hinweise und Tipps.
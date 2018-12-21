LET’S EVENT INSTALLATIE
STAPPENPLAN
1) Ga naar de root folder van je webserver (wwwroot/htdocs)
2) Open een command prompt en installeer Laravel
- composer global require laravel/installer 
3) Na het installeren van Laravel maak een folder aan voor het project via de cmd
- laravel new LetsEvent 
4) Navigeer naar de folder en update de composer in de cmd
- cd LetsEvent - composer install 
5) Maak in je database omgeving een nieuwe database aan “ao-letsevent” en voer hierna de
migraties uit
- composer dump-autoload - php artisan migrate:fresh –seed 
6) Download de “Lets Event“ bestanden via de GitHub release en plaats deze in de LetsEvent
folder.
- https://bit.ly/2APdhFk 
7) Wijzig de .env in de LetsEvent folder naar je eigen database gegevens en de database naar
Letsevent.
- “DB_DATABASE=ao-letsevent”
8) Via je localhost url kan je de website bezoeken.

https://trello.com/b/uLNBEAg3/lets-event

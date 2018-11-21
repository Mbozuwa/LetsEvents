<?php
/*================================================================*\
|| # Localization file
|+==================================================================
|| # To create a new language;
|| # Create a new folder in /resources/lang with the corresponding
|| # language - add a msg.php file and copy everything from the EN
|| # language file into the new one... Translate and done!
|| # Add a new translation by using {{ __('*CODE*') }}
|| # inside the view. Translation must be present in every language.
|| # - Laurens :-)
\*================================================================*/

return [
    'app.name' => 'LETS EVENT',
    'calender.countrycode' => 'nl-be',

    'welcome' => 'Welkom',
    'lang.nl' => 'Nederlands',
    'lang.en' => 'Engels',
    'lang.de' => 'Duits',
    'lang.cn' => 'Chinees',

    'langShortcode.nl' => 'NL',
    'langShortcode.en' => 'EN',
    'langShortcode.de' => 'DE',
    'langShortcode.cn' => 'CN',

    'menu' => 'Menu',
    'menu.register' => 'Registreer',
    'menu.login' => 'Log in',
    'menu.logout' => 'Uitloggen',
    'menu.myProfile' => 'Mijn profiel',
    'menu.createEvent' => 'Maak een evenement aan',
    'menu.createdEvents' => 'Gemaakte evenementen',

    'nav.home' => 'Startpagina',
    'nav.profile' => 'Profiel',
    'nav.events' => 'Evenementen',
    'nav.overview' => 'Overzicht',
    'nav.myEvents' => 'Mijn evenementen',
    'nav.admin' => 'Admin',
    'nav.schools' => 'Scholen',

    'notification.iGo' => 'Je gaat naar het evenement:',
    'notification.iMaybe' => 'Je gaat misschien naar het evenement:',
    'notification.iDontGo' => 'Je gaat niet naar het evenement:',
    'notification.delete' => 'Verwijder notificatie',

    'event.iGo' => 'Ik ga',
    'event.iMaybe' => 'Ik ga misschien',
    'event.iDontGo' => 'Ik ga niet',
    'event.noStatus' => 'Geen status',

    'email' => 'E-mailadres',
    'password' => 'Wachtwoord',
    'address' => 'Adres',
    'place' => 'Plaats',
    'edit' => 'Bewerken',
    'modify' => 'Wijzigen',
    'participants' => 'Deelnemers',
    'participantsAmount' => 'Aantal deelnemers',
    'participantsMax' => 'Max. deelnemers',

    /*Signin page*/
    'signin.logyouracc' => 'Login met je account',
    'signin.noaccount' => 'Heb je geen account?',
    'signin.register' => 'Registreer je hier!',
    'signin.btn' => 'LOG IN',

    /*Signup page*/
    'signup.createacc' => 'Maak een account',
    'signup.name' => 'Naam',
    'signup.address' => 'Adres',
    'signup.phone' => 'Telefoonnummer',
    'signup.requiredfields' => 'De met een (*) gemarkeerde velden moeten worden ingevuld.',
    'signup.btn' => 'REGISTREER',
    'signup.alreadyacc' => 'Heb je al een account?',
    'signup.login' => 'Log in!',

    /*403 Error page*/
    '403' => 'Jij hoort hier niet te zijn!',

    /*404 Error page*/
    '404' => 'Kan de pagina niet vinden!',

    /*413 Error page*/
    '413' => 'De toegestuurde data is te groot!',

    /*500 Error page*/
    '500' => 'Er is een fout bij de server opgetreden!',

    /*Event overview*/
    'eventtable.name' => 'Naam',
    'eventtable.place' => 'Plaats',
    'eventtable.address' => 'Adres',
    'eventtable.maxparticipants' => 'Max deelnemers',
    'eventtable.begintime' => 'Begin tijd',
    'eventtable.endtime' => 'Eind tijd',
    'eventtable.eventby' => 'Aangemaakt door',
    'eventtable.noEvents.title' => 'Geen evenementen',
    'eventtable.noEvents.desc1' => 'Op dit moment zijn er geen evenementen aangemaakt.',
    'eventtable.noEvents.click' => 'Klik hier',
    'eventtable.noEvents.desc2' => 'om een evenement aan te maken.',

    /*Event show (event.blade)*/
    'event.info.soon' => 'DIT EVENEMENT BEGINT BINNENKORT',
    'event.info.now' => 'DIT EVENEMENT IS NU BEZIG',
    'event.info.ended' => 'DIT EVENEMENT IS AFGELOPEN',
    'event.startdate' => 'BEGINDATUM',
    'event.enddate' => 'EINDDATUM',
    'event.regFees' => 'INSCHRIJFKOSTEN',
    'event.about' => 'OVER DIT EVENEMENT',
    'event.info' => 'ALGEMENE INFORMATIE',
    'event.eventinfo' => 'EVENT INFORMATIE',
    'event.signupTime' => 'Aanmelden kan tot',
    'event.signupNoTime' => 'Aanmelden kan',
    'event.signupAlways' => 'altijd',
    'event.createdBy' => 'Dit evenement is gemaakt door',
    'event.tothisevent' => 'naar dit evenement',
    'event.userStatus' => 'Je huidige status',
    'event.letusknow' => 'Laat weten of je komt',

    'error.event.title1' => 'Aanmeldtijd verlopen!',
    'error.event.desc1' => 'Helaas, de tijd om je aan te melden voor dit evenement is voorbij. Als je je al eerder hebt aangemeld voor dit evenement, dan is het niet meer mogelijk om je af te melden.',
    'error.event.title2' => 'Maximaal aantal deelnemers!',
    'error.event.desc2' => 'Helaas, dit evenement zit aan het maximaal aantal deelnemers, hierdoor kan je je niet meer aanmelden.',
    'error.event.title3' => 'Je bent op dit moment niet ingelogd!',
    'error.event.desc3' => 'Klik hier om in te loggen en je aan te melden voor dit evenement.',

    /*Profile overview*/
    'profile.name' => 'Naam',
    'profile.email' => 'Email',
    'profile.address' => 'Adres',
    'profile.phoneNumber' => 'Telefoon',
    'profile.type' => 'Type',
    'profile.user' => 'Gebruiker',
    'profile.admin' => 'Beheerder',
    'profile.edit' => 'Bewerken',
    'profile.header' => 'Mijn profiel',
    'profile.image' => '*De foto mag niet groter zijn dan 500 x 500*',

    /*ProfileController overview*/
    'ProfileController.edit' => 'Profiel succesvol bewerkt!',


    /*Schools overview*/
    'school.name' => 'Naam',
    'school.place' => 'Plaats',
    'school.address' => 'Het adres',
    'school.edit' => 'Bewerken',
    'school.delete' => 'Verwijder',
    'school.school' => 'De school',
    'school.schools' => 'De scholen',
    'school.makeSchoolTitle' => 'Maak een school aan.', 
    'school.editSchool' => 'Pas de school aan.',
    'school.editSchoolTitle' => 'Pas een school aan',
    'school.new' => 'Een nieuwe school',

    /*Controller messages*/
    'EventController.updateStatus.success' => 'Status succesvol bewerkt!',
    'EventController.updateStatus.error' => 'Niet gelukt!',
    'EventController.store.error' => 'De tijd om je aan te melden is na de eind tijd van het evenement.',
    'EventController.edit.error1' => 'Dit evenement bestaat niet.',
    'EventController.edit.error2' => 'Dat is niet jouw evenement!',
    'EventController.delete.success' => 'Evenement succesvol verwijderd.',
    'EventController.delete.error' => 'Dit evenement kan niet verwijderd worden.',
    'EventController.info.error' => 'Deze informatie gaat jou niks aan!',
    'EventController.saveCategory.success' => 'De categorie is aangepast.',

    'SchoolController.info.delete.succes' => 'School succesvol verwijderd.',
    'SchoolController.info.edit.succes' => 'De school is aangepast.',
    'SchoolController.info.create.succes' => 'De school is aangemaakt.',
    ''
];

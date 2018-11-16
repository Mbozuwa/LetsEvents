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

    'welcome' => 'Willkommen',
    'lang.nl' => 'Niederländisch',
    'lang.en' => 'Englisch',
    'lang.de' => 'Deutsch',
    'lang.cn' => 'chinesisch',

    'langShortcode.nl' => 'NL',
    'langShortcode.en' => 'EN',
    'langShortcode.de' => 'DE',
    'langShortcode.cn' => 'CH',


    'menu' => 'Menü',
    'menu.register' => 'Registrieren',
    'menu.login' => 'Einloggen',
    'menu.logout' => 'Abmelden',
    'menu.myProfile' => 'Mein profil',
    'menu.createEvent' => 'Erstellen Sie ein Ereignis',
    'menu.createdEvents' => 'Ereignisse wurden erstellt',

    'nav.home' => 'Startseite',
    'nav.profile' => 'Profil',
    'nav.events' => 'Ereignisse',
    'nav.overview' => 'Überblick',
    'nav.myEvents' => 'Meine Ereignisse',
    'nav.admin' => 'Admin',

    'notification.delete' => 'Benachrichtigung löschen',

    'event.iGo' => 'Ich gehe',
    'event.iMaybe' => 'Ich könnte gehen',
    'event.iDontGo' => 'Ich gehe nicht',
    'event.noStatus' => 'Kein Status',

    'email' => 'E-Mail-Adresse',
    'password' => 'Passwort',

    /*Signin page*/
    'signin.logyouracc' => 'Melde dich mit deinem Konto an',
    'signin.noaccount' => 'Hast du kein Konto?',
    'signin.register' => 'Melde dich hier an!',
    'signin.btn' => 'ANMELDEN',

    /*Signup page*/
    'signup.createacc' => 'Erstellen Sie ein Konto',
    'signup.name' => 'Name',
    'signup.address' => 'Adresse',
    'signup.phone' => 'Telefonnummer',
    'signup.requiredfields' => 'Die mit einem (*) gekennzeichneten Felder müssen eingegeben werden.',
    'signup.btn' => 'registrieren',
    'signup.alreadyacc' => 'Hast du schon einen Account?',
    'signup.login' => 'Melde dich an!',

    /*Event overview*/
    'eventtable.name' => 'Name',
    'eventtable.place' => 'Platzieren',
    'eventtable.address' => 'Addresse',
    'eventtable.maxparticipants' => 'Max Teilnehmer',
    'eventtable.begintime' => 'Start Zeit',
    'eventtable.endtime' => 'Ende der Zet',
    'eventtable.eventby' => 'Erstelt Von',
    'eventtable.noEvents.title' => 'Kein Ereignisse',
    'eventtable.noEvents.desc1' => 'Zu diesem Zeitpunkt wurden noch keine Ereignisse erstellt.',
    'eventtable.noEvents.click' => 'Hier Klincken',
    'eventtable.noEvents.desc2' => 'eine Veranstaltung erstellen.',

    /*403 Error page*/
    '403' => 'du solltest nicht hier sein!',

    /*404 Error page*/
    '404' => 'Kann die Seite nicht finden!',

    /*413 Error page*/
    '413' => 'Die wichtigsten Daten sind der Groot!',

    /*500 Error page*/
    '500' => 'Beim Server ist ein Fehler aufgetreten!',

    /*Profile overview*/
    'profile.email' => 'Email',
    'profile.phoneNumber' => 'Telefon',
    'profile.type' => 'Type',
    'profile.user' => 'Benutzer',
    'profile.admin' => 'Administrator',
    'profile.edit' => 'Bearbeiten',
    'profile.header' => 'Mein Profil',
    'profile.image' => '*Das Foto darf nicht größer als 500 x 500 sein*',

    /*ProfileController overview*/
    'ProfileController.edit' => 'Profil erfolgreich bearbeitet!',

    /*Schools overview*/
    'school.name' => 'Name',
    'school.place' => 'Platz',
    'school.address' => 'Die adresse',
    'school.edit' => 'Bearbeiten',
    'school.delete' => 'Löschen',
    'school.school' => 'Die schule',
    'school.schools' => 'Die schulen',
    'school.editSchool' => 'Bearbeiten sie die schule',
    'school.editSchoolTitle' => 'Bearbeiten sie eine schule',
    'school.new' => 'Eine neue schule'


];

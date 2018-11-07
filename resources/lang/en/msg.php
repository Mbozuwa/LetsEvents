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
    'calender.countrycode' => 'en-gb',

    'welcome' => 'Welcome',
    'lang.nl' => 'Dutch',
    'lang.en' => 'English',
    'lang.de' => 'German',
    'lang.cn' => 'Chinese',

    'langShortcode.nl' => 'NL',
    'langShortcode.en' => 'EN',
    'langShortcode.de' => 'DE',
    'langShortcode.cn' => 'CN',

    'menu' => 'Menu',
    'menu.register' => 'Register',
    'menu.login' => 'Log in',
    'menu.logout' => 'Log out',
    'menu.myProfile' => 'My profile',
    'menu.createEvent' => 'Create an event',
    'menu.createdEvents' => 'My events',

    'nav.home' => 'Home',
    'nav.profile' => 'Profile',
    'nav.events' => 'Events',
    'nav.overview' => 'Overview',
    'nav.myEvents' => 'My events',
    'nav.admin' => 'Admin',

    'notification.delete' => 'Delete notification',

    'event.iGo' => 'I\'m participating',
    'event.iMaybe' => 'I might go',
    'event.iDontGo' => 'I won\'t participate',
    'event.noStatus' => 'No status',

    'email' => 'Email',
    'password' => 'Password',

    /*Signin page*/
    'signin.logyouracc' => 'Login to your account',
    'signin.noaccount' => 'Don\'t have an account?',
    'signin.register' => 'Sign up!',
    'signin.btn' => 'SIGN IN',

    /*Signup page*/
    'signup.createacc' => 'Create an account',
    'signup.name' => 'Name',
    'signup.address' => 'Address',
    'signup.phone' => 'Phone number',
    'signup.requiredfields' => 'The fields marked with a (*) are required.',
    'signup.btn' => 'SIGN UP',
    'signup.alreadyacc' => 'Already have an account?',
    'signup.login' => 'Sign in!',

    /*Event overview*/
    'eventtable.name' => 'Name',
    'eventtable.place' => 'Country',
    'eventtable.address' => 'Address',
    'eventtable.maxparticipants' => 'Max participants',
    'eventtable.begintime' => 'Begin time',
    'eventtable.endtime' => 'End time',
    'eventtable.eventby' => 'Created by',
    'eventtable.noEvents.title' => 'No events created',
    'eventtable.noEvents.desc1' => 'At this moment no events have been created.',
    'eventtable.noEvents.click' => 'Click here',
    'eventtable.noEvents.desc2' => 'to create an new event.',
];

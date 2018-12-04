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
    'nav.schools' => 'Schools',

    'notification.iGo' => 'You\'re participating in event:',
    'notification.iMaybe' => 'You might go to the event:',
    'notification.iDontGo' => 'You\'re not participating in event:',
    'notification.delete' => 'remove notification',

    'event.iGo' => 'I\'m participating',
    'event.iMaybe' => 'I might go',
    'event.iDontGo' => 'I\'m not participating',
    'event.noStatus' => 'No status',

    'email' => 'Email',
    'password' => 'Password',
    'address' => 'Address',
    'place' => 'Place',
    'edit' => 'Edit',
    'modify' => 'Modify',
    'participants' => 'Participants',
    'participantsAmount' => 'Number of participants',
    'participantsMax' => 'Max. participants',
    'categories' => 'Categories',
    'delete' => 'Remove',

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

    /*403 Error page*/
    '403' => 'You do not belong here!',

    /*404 Error page*/
    '404' => 'Could not find the webpage!',

    /*413 Error page*/
    '413' => 'The sent data is too big!',

    /*500 Error page*/
    '500' => 'Something went wrong with the server!',

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

    /*Event show (event.blade)*/
    'event.info.soon' => 'THIS EVENT IS COMING SOON',
    'event.info.now' => 'THIS EVENT IS NOW BUSY',
    'event.info.ended' => 'THIS EVENT HAS ENDED',
    'event.startdate' => 'START DATE',
    'event.enddate' => 'END DATE',
    'event.regFees' => 'REGISTRATION FEES',
    'event.about' => 'ABOUT THIS EVENT',
    'event.info' => 'GENERAL INFORMATION',
    'event.eventinfo' => 'EVENT INFORMATION',
    'event.signupTime' => 'Sign up is possible until',
    'event.signupNoTime' => 'Sign up until',
    'event.signupAlways' => 'always',
    'event.createdBy' => 'This event is created by',
    'event.tothisevent' => 'to this event',
    'event.userStatus' => 'Your current status',
    'event.letusknow' => 'Let us know if you\'ll be participating',
    'event.regFree' => 'Free',
    'event.showevent' => 'Show page',

    'event.myParticipatedEvents.title' => 'My participated events',
    'event.myParticipatedEvents.subtitle1' => 'You have signed up for',
    'event.myParticipatedEvents.subtitle2' => 'of the',
    'event.myParticipatedEvents.subtitle3' => 'available events.',
    'event.myParticipatedEvents.date' => 'Date',
    'event.myParticipatedEvents.addressplace' => 'Address and place',
    'event.myParticipatedEvents.soon' => 'SOON',
    'event.myParticipatedEvents.now' => 'NOW BUSY',
    'event.myParticipatedEvents.ended' => 'ENDED',
    'event.myParticipatedEvents.showevent' => 'Show event page',

    'error.event.title1' => 'Sign up time expired!',
    'error.event.desc1' => 'Unfortunately, the time to sign up for this event is over. If you have already registered for this event before, it is no longer possible to unsubscribe.',
    'error.event.title2' => 'Maximum number of participants!',
    'error.event.desc2' => 'Unfortunately, this event is at the maximum number of participants, so you can no longer sign up.',
    'error.event.title3' => 'You are currently not logged in!',
    'error.event.desc3' => 'Click here to log in and sign up for this event.',

    /*Event create & edit*/
    'event.create.title' => 'Create an event',
    'event.name' => 'Name',
    'event.desc' => 'Description',
    'event.place' => 'Place',
    'event.address' => 'Address',
    'event.maxparticipants' => 'Maximum number of participants',
    'event.regfees' => 'Amount in euros',
    'event.create.startdate' => 'Start date',
    'event.create.enddate' => 'End date',
    'event.signupTime' => 'Sign up is possible until',
    'event.create.signupNoTime' => 'Keep this field empty if participants are always allowed to sign up.',
    'event.required' => 'This is required *',
    'event.create.submit' => 'Create an event',
    'event.image.title' => 'Upload image for event',
    'event.edit.image.title' => 'Event image',
    'event.edit.image.desc' => 'The image above will be used for your event. If you want to change it then upload a new image above.',
    'event.edit.title' => 'Edit this event',
    'event.edit.submit' => 'Edit event',

    /*Profile overview*/
    'profile.name' => 'Name',
    'profile.email' => 'Email',
    'profile.address' => 'Address',
    'profile.phoneNumber' => 'Telephone',
    'profile.type' => 'Type',
    'profile.user' => 'User',
    'profile.admin' => 'Admin',
    'profile.edit' => 'Edit',
    'profile.header' => 'My profile',
    'profile.image' => '*The picture cannot be bigger then 500 x 500*',

    /*ProfileController overview*/
    'ProfileController.edit' => 'Profile succesfully edited',

    /*Schools overview*/
    'school.name' => 'Name',
    'school.edit' => 'Edit',
    'school.delete' => 'Remove',
    'school.school' => 'The school',
    'school.schools' => 'The schools',
    'school.makeSchoolTitle' => 'Create a school.',
    'school.editSchool' => 'Edit the school.',
    'school.editSchoolTitle' => 'Edit a school',
    'school.new' => 'Add school',

    /*Admin*/
    'admin' => 'Admin',
    'adm.user' => 'User',
    'adm.email' => 'Email',
    'adm.activity' => 'Activity',
    'adm.confirm' => 'Are you sure you want to (temporary) ban this user?',

    /*Controller messages*/
    'EventController.updateStatus.success' => 'Status successfully edited!',
    'EventController.updateStatus.error' => 'Failed!',
    'EventController.store.error' => 'The time to sign up is after the end time of the event.',
    'EventController.edit.error1' => 'This event does not exist.',
    'EventController.edit.error2' => 'That\'s not your event!',
    'EventController.delete.success' => 'Event successfully removed.',
    'EventController.delete.error' => 'This event can not be removed, there are still participants linked',
    'EventController.info.error' => 'This information is of no use to you!',
    'EventController.saveCategory.success' => 'The category has been modified.',

    /*SchoolController*/
    'SchoolController.info.delete.succes' => 'School successfully removed.',
    'SchoolController.info.edit.succes' => 'School successfully edited.',
    'SchoolController.info.create.succes' => 'The school has been created.',
    'StudentController.chooseschool.success' => 'School is chosen.',

    'reminder' => 'reminder',
    'reminder.firstLine' => 'This is a mail so that you know that you are registered.',
    'reminder.secondLine' => 'You have signed up for this event',
    'reminder.description' => 'The description',
    'reminder.payment' => 'You still have to pay.'
];

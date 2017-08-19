<?php

// The displayed name of the server
$SERVER_NAME = 'PlexRedirect - my Plex server';

// The actual URL of the server
$SERVER_URL = $_SERVER['SERVER_NAME'];

// Plex App URL
// $PLEX_URL = 'app.plex.tv/web/app';
$PLEX_APP_URL = $PLEX_SERVER_URL;

// The URL to ping
$PLEX_SERVER_URL = $SERVER_URL.':32400/web';

// PlexRequests URL
$PLEX_REQUESTS_URL = $SERVER_URL.':3000/search';

//Server Stats URL
$SERVER_STATS_URL = $SERVER_URL.':19999';
//Set to true to show a desaturated logo
$SERVER_STATS_DESATURATE = false ;

//Slack Team URL
$SLACK_URL = "" ;
//Set to true to show a desaturated logo
$SLACK_DESATURATE = false ;

// PlexPy URL
$PLEXPY_URL = $SERVER_URL.':8181';
// PlexPy API Key
$PLEXPY_API = '';
// Comma-separated list of section names to count as Movies
$MOVIE_LIBS = 'Movies';
// Comma-separated list of section names to count as TV Shows
$TV_LIBS = 'TV Shows';

// DONATE (leave both blank to hide Donate section)
// Donate URL
$DONATE_URL = '';
// PayPal inner-most "hosted_button_id" value
$PAYPAL_BUTTON_ID = '';

// TV SHOW CALENDAR
// For more info see https://fullcalendar.io/docs/google_calendar/
$GOOGLE_CALENDAR_API_KEY = '';
$GOOGLE_CALENDAR_ID = '';


// LIBRARY

// Minimum number of movies in your library
$MOVIE_COUNT = 100;
// Minimum number of TV shows in your library
$TV_COUNT = 30;

?>

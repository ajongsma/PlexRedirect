<?php

// The displayed name of the server
$SERVER_NAME = 'PlexRedirect - my Plex server';

// The actual URL of the server
$SERVER_URL = $_SERVER['SERVER_NAME'];

// The URL to ping
$PLEX_SERVER_URL = $SERVER_URL.':32400/web';

// Plex App URL
// $PLEX_APP_URL = 'app.plex.tv/web/app';
$PLEX_APP_URL = $SERVER_URL.':32400/web';
$PLEX_APP_ENABLED = true ;

// PlexRequests URL
$PLEX_REQUESTS_URL = $SERVER_URL.':3000/search';
$PLEX_REQUESTS_ENABLED = true ;

// MY-NETDATA.IO
$NETDATA_SERVER = $SERVER_URL;
$NETDATA_PORT = '19999';
$NETDATA_APP_URL = $NETDATA_SERVER.":".$NETDATA_PORT;
$NETDATA_ENABLED = true ;

//Server Stats URL
$SERVER_STATS_URL = $SERVER_URL.':19999';
$SERVER_STATS_ENABLED = true ;

//Set to true to show a desaturated logo
$SERVER_STATS_DESATURATE = false ;

// PlexPy URL
$PLEXPY_URL = $SERVER_URL.':8084';
$PLEXPY_ENABLED = true ;
// PlexPy API Key
$PLEXPY_API = '';
// Comma-separated list of section names to count as Movies
$MOVIE_LIBS = 'Movies';
// Comma-separated list of section names to count as TV Shows
$TV_LIBS = 'TV Shows';

// TV SHOW CALENDAR
// For more info see https://fullcalendar.io/docs/google_calendar/
$GOOGLE_CALENDAR_API_KEY = '';
$GOOGLE_CALENDAR_ID = '';

// DONATE (leave both blank to hide Donate section)
// Donate URL
$DONATE_URL = '';
// PayPal inner-most "hosted_button_id" value
$PAYPAL_BUTTON_ID = '';

//Slack Team URL
$SLACK_URL = "" ;
//Set to true to show a desaturated logo
$SLACK_DESATURATE = false ;


// LIBRARY

// Minimum number of movies in your library
$MOVIE_COUNT = 100;
// Minimum number of TV shows in your library
$TV_COUNT = 30;

?>

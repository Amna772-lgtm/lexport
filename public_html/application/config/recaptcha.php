<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

$config['recaptcha_secret'] = getenv( 'RECAPTCHA_SECRET_KEY' );
$config['google_calendar_api_key'] = getenv( 'GOOGLE_CALENDAR_API_KEY' );
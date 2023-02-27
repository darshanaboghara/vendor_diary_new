<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//  custom constant
defined('IS_LOCAL')      OR define('IS_LOCAL', in_array($_SERVER['SERVER_ADDR'], ["::1","127.0.0.1"])); 

if(IS_LOCAL){
    defined('BASE_URL')      OR define('BASE_URL', "http://localhost/vendor_diary/");
    // define('ENVIRONMENT', 'development');

    defined('DB_HOST')      OR define('DB_HOST', "localhost"); 
    defined('DB_USER')      OR define('DB_USER', "root"); 
    defined('DB_PASS')      OR define('DB_PASS', ""); 
    defined('DB_NAME')      OR define('DB_NAME', "vendor_diary"); 
}else{
    //  define('ENVIRONMENT', 'production');
    //die(ENVIRONMENT);
    defined('BASE_URL')      OR define('BASE_URL', "https://vendordiary.com/"); 
    
    defined('DB_HOST')      OR define('DB_HOST', "localhost"); 
    defined('DB_USER')      OR define('DB_USER', "devnimesh"); 
    defined('DB_PASS')      OR define('DB_PASS', "GlVyC}Yr4oxn"); 
    defined('DB_NAME')      OR define('DB_NAME', "vendordb");
    defined('MAIL_ID')      OR define('MAIL_ID', "");
    defined('MAIL_PASSWORD')      OR define('MAIL_PASSWORD', '');
    
}

//Stripe KeySET stripe privet key(SPK)  && Stripe Secret key(SSK)

    defined('SPK')      OR define('SPK', "pk_test_51JUS4gKvjpg8DZH18yDwyL2TAfDwHe3Msp4AXYfUrqh5c31Couc6fsa3Hn8u83001a4WpRdc7qmpNwuCcuCkFnwa00w5LG56Nw"); 
    defined('SSK')      OR define('SSK', "sk_test_51JUS4gKvjpg8DZH105Z3BGJpLaNxaBQe1D6b6eR8ubOf05gf8SgGBG3wsvqRGNI52oUUmfbzFT2SCh2qpXqWhAJ400i4LF1Viu"); 
    
//staff Url
    defined('STAFF_URL')      OR define('STAFF_URL', BASE_URL."staff/");
    
//recaptcha
defined('RECAPTCHA_KEY')      OR define('RECAPTCHA_KEY', "6LcuvA8cAAAAAEPxukXMkxyiYNeg_kGVGw2s254I");

//Google Auth
defined('GOOGLE_AUTH_CID')      OR define('GOOGLE_AUTH_CID', "172159539927-rsli4anlv0kjd9sfdr358hst7dnk01g7.apps.googleusercontent.com");
//Image URL
defined('IMAGELINK')      OR define('IMAGELINK', "assets/vendorimage/");
defined('ASSETSURL')      OR define('ASSETSURL', BASE_URL."assets/new/");


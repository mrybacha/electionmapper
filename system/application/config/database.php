<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "default";
$active_record = TRUE;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "election_web";
$db['default']['password'] = "assword";
$db['default']['database'] = "election_59021";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

$db['2009']['hostname'] = "localhost";
$db['2009']['username'] = "election_web";
$db['2009']['password'] = "assword";
$db['2009']['database'] = "election_2009";
$db['2009']['dbdriver'] = "mysql";
$db['2009']['dbprefix'] = "";
$db['2009']['pconnect'] = TRUE;
$db['2009']['db_debug'] = TRUE;
$db['2009']['cache_on'] = FALSE;
$db['2009']['cachedir'] = "";
$db['2009']['char_set'] = "utf8";
$db['2009']['dbcollat'] = "utf8_general_ci";

$db['2008']['hostname'] = "localhost";
$db['2008']['username'] = "election_web";
$db['2008']['password'] = "assword";
$db['2008']['database'] = "election_2008";
$db['2008']['dbdriver'] = "mysql";
$db['2008']['dbprefix'] = "";
$db['2008']['pconnect'] = TRUE;
$db['2008']['db_debug'] = TRUE;
$db['2008']['cache_on'] = FALSE;
$db['2008']['cachedir'] = "";
$db['2008']['char_set'] = "utf8";
$db['2008']['dbcollat'] = "utf8_general_ci";

$db['2006']['hostname'] = "localhost";
$db['2006']['username'] = "election_web";
$db['2006']['password'] = "assword";
$db['2006']['database'] = "election_2006";
$db['2006']['dbdriver'] = "mysql";
$db['2006']['dbprefix'] = "";
$db['2006']['pconnect'] = TRUE;
$db['2006']['db_debug'] = TRUE;
$db['2006']['cache_on'] = FALSE;
$db['2006']['cachedir'] = "";
$db['2006']['char_set'] = "utf8";
$db['2006']['dbcollat'] = "utf8_general_ci";

$db['2004']['hostname'] = "localhost";
$db['2004']['username'] = "election_web";
$db['2004']['password'] = "assword";
$db['2004']['database'] = "election_2004";
$db['2004']['dbdriver'] = "mysql";
$db['2004']['dbprefix'] = "";
$db['2004']['pconnect'] = TRUE;
$db['2004']['db_debug'] = TRUE;
$db['2004']['cache_on'] = FALSE;
$db['2004']['cachedir'] = "";
$db['2004']['char_set'] = "utf8";
$db['2004']['dbcollat'] = "utf8_general_ci";


/* End of file database.php */
/* Location: ./system/application/config/database.php */
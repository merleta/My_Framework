<?php //phpinfo();

require_once (dirname(__FILE__) . "/../lib/antoine/Core.php");

lib\antoine\Core::loadConfig();

lib\antoine\Core::run();

?>
<?php
//echo password_hash('123', 1);

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(CONTROLLER_PATH .'/loginController.php');

loadView('login', ['texto' => 'abc123']);

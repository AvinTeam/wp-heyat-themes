<?php

(defined('ABSPATH')) || exit;

date_default_timezone_set('Asia/Tehran');

define('HEYAT_VERSION', '1.0.0');

define('HEYAT_PATH', get_template_directory() . "/");
define('HEYAT_INCLUDES', HEYAT_PATH . 'includes/');
define('HEYAT_CLASS', HEYAT_PATH . 'classes/');
define('HEYAT_CORE', HEYAT_PATH . 'core/');
define('HEYAT_VIEWS', HEYAT_PATH . 'views/');
define('HEYAT_COMPONENTS', HEYAT_PATH . 'components/');

define('HEYAT_URL', get_template_directory_uri() . "/");
define('HEYAT_ASSETS', HEYAT_URL . 'assets/');
define('HEYAT_CSS', HEYAT_ASSETS . 'css/');
define('HEYAT_JS', HEYAT_ASSETS . 'js/');
define('HEYAT_IMAGE', HEYAT_ASSETS . 'image/');
define('HEYAT_VENDOR', HEYAT_ASSETS . 'vendor/');

require_once HEYAT_CORE . '/accesses.php';

require_once HEYAT_INCLUDES . '/init.php';
require_once HEYAT_INCLUDES . '/styles.php';
require_once HEYAT_INCLUDES . '/theme_filter.php';
require_once HEYAT_INCLUDES . '/theme-function.php';
require_once HEYAT_INCLUDES . '/jdf.php';


if (is_admin()) {
    require_once HEYAT_INCLUDES . '/install.php';

}

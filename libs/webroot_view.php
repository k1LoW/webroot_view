<?php
/**
 * Original is https://github.com/k1LoW/webroot_view
 */
/* put this file in yourapp/app/libs/ */
$_GET['url'] = 'favicon.ico'; // bad hack

require(dirname(dirname(__FILE__)) . '/webroot/index.php');
$trace = debug_backtrace();
$base = str_replace('/' . str_replace(WWW_ROOT, '', $trace[0]['file']), '', env('PHP_SELF'));
Router::setRequestInfo(array(array(), array('base' => $base, 'here' => env('PHP_SELF'), 'webroot' => $base . '/')));
require(CONFIGS . 'routes.php');

$view = ClassRegistry::init('view');

/**
 *  import helper
 */
if (isset($helpers)) {
    foreach ((array)$helpers as $helper) {
        App::import('Helper', $helper);
        $class = $helper . 'Helper';
        $view->{$helper} = new $class();
    }
} else {
    App::import('Helper', 'Html');
    App::import('Helper', 'Session');

    $view->Html = new HtmlHelper();
    $view->Session = new SessionHelper();
}
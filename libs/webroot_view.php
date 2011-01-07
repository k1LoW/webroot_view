<?php
  /* put this file in yourapp/app/libs/ */
$_GET['url'] = 'favicon.ico'; // bad hack

require(dirname(__FILE__) . '/../webroot/index.php');
$config = Configure::read('App');
extract($config);
$replace = array('<', '>', '*', '\'', '"');
$base = str_replace($replace, '', dirname(env('PHP_SELF')));
if ($webroot === 'webroot') {
    $base = preg_replace('/' . $webroot . '.*/', '', $base);
}
if ($dir === 'app' && $dir === basename($base)) {
    $base = dirname($base);
}
$webroot = $base . '/';
Router::setRequestInfo(array(array(), array('base' => $base, 'here' => env('PHP_SELF'), 'webroot' => $webroot)));
require(dirname(__FILE__) . '/../config/routes.php');

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
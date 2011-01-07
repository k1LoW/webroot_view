# webroot_view.php #

CakePHP library for use elements and helpers under app/webroot/

## Bad hack ##

This library use bad hack...

## Installation ##

Put `webroot_view.php` on app/libs in your CakePHP application.

## Usage ##

If you use helper under app/webroot, add the following code.

    <?php /* myapp/app/webroot/foo/bar.php */
        require('../../libs/webroot_view.php');
        echo $view->element('header');
        echo $view->Html->link('link_title', array('controller' => 'posts', 'action' => 'index'));

### Load helpers ###

Set `$helpers` and load helpers (default: HtmlHelper and SessionHelper).

    <?php /* myapp/app/webroot/foo/bar.php */
        $helpers = array('Html', 'Form');
        require('../../libs/webroot_view.php');
        echo $view->Form->create('Foo');
        echo $view->Form->input('name', array('type' => 'text'));
        echo $view->Form->end('Submit');

## License ##

The MIT Lisence

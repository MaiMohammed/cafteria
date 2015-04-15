<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

protected function _initPlaceholders() {
$this->bootstrap('View');
$view = $this->getResource('View');
//$view->doctype('XHTML1_STRICT');
//Meta
$view->headMeta()->appendName('keywords', 'framework, PHP')->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');

// Set the initial title and separator:
$view->headTitle('OS Site')->setSeparator(' :: ');
// Set the initial stylesheet:
//$view->headLink()->prependStylesheet('/css/site.css');
// Set the initial JS to load:
//$view->headScript()->prependFile('/js/jquery-ui.js');
//$view->headScript()->prependFile('/js/jquery-1.9.1.js');
//$view->headScript()->prependFile('/js/themes/base/ui.all.css');
//$view->headScript()->prependFile('/js/jquery-1.11.2.js');
//$view->headScript()->prependFile('/js/jquery-1.11.2.min.js');
//
//$view->headScript()->prependFile('/js/jquery-1.11.2.min.js');


$viewx = new Zend_View();
$viewx->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');
$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
$viewRenderer->setView($viewx);
Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
}

}

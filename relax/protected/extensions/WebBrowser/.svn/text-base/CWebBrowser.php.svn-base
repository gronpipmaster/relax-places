<?php

include_once(dirname(__FILE__)."/sfWebBrowserPlugin/lib/sfWebBrowser.class.php");
include_once(dirname(__FILE__)."/sfException.class.php");


/**
 * Description of CWebBrowser
 *
 * @uses sfWebBrowserPlugin - pligin for symfony framework
 * 
 * To se the documentation please visit
 * @link http://www.symfony-project.org/plugins/sfWebBrowserPlugin/1_1_2
 *
 * @author Alexander Biryukov <alex.biryukoff@gmail.com>
 */
class CWebBrowser extends CApplicationComponent
{
    public $adapter        = null;
    public $adapterOptions = array();

    protected $client = null;
    
    private $adaptersMap = array('curl' => 'sfCurlAdapter', 'sockets' => 'sfSocketsAdapter', 'fopen' => 'sfFopenAdapter');


    public function  __call($name, $parameters)
    {
        if (method_exists($this->client, $name)) {
            return call_user_func_array(array($this->client, $name), $parameters);
        } else {
            return parent::__call($name, $parameters);
        }
    }

    public function init()
    {
        $adapterClass = null;
        if (array_key_exists($this->adapter, $this->adaptersMap)) {
            $adapterClass = $this->adaptersMap[$this->adapter];
        } else {
            $adapterClass = $this->adaptersMap['curl'];
        }

        include_once(dirname(__FILE__)."/sfWebBrowserPlugin/lib/".$adapterClass.".class.php");

        $this->client = new sfWebBrowser(array(), $adapterClass, $this->adapterOptions);
        
        parent::init();
    }
}


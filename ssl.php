<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die();

class plgSystemSSL extends JPlugin
{

    public function onAfterRoute()
    {
        $exclude = $this->params->get('exclude');
        $uri = JFactory::getURI();
        
        if (empty($exclude) || $uri->isSSL()) {
            return;
        }
        
        if (preg_match('#' . JString::trim($exclude) . '#', $uri->toString()) == false) {
            $uri->setScheme('https');
            JFactory::getApplication()->redirect($uri->toString());
        }
    }
}
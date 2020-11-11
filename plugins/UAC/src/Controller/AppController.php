<?php

namespace UAC\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function beforeFilter(Event $event) 
    {
    	if ($this->Auth->user('id') !== 1)
    	{
	        return $this->redirect(
	            ['plugin' => null, 'controller' => 'Entries', 'action' => 'index']
	        );
    	}
    }
}

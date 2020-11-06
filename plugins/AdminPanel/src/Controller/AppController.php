<?php

namespace AdminPanel\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function beforeFilter(Event $event) 
    {
        $this->layout = "tourist_blog_admin";
    }
}

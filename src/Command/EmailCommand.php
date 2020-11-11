<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;

// bin/cake email
class EmailCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
    	// Better to set all this in app.php's EmailTransport section
		// TransportFactory::setConfig('gmail', [
		//     'host' => 'smtp.gmail.com',
		//     'port' => 587,
		//     'username' => '',
		//     'password' => '',
		//     'className' => 'Smtp',
		//     'tls' => true
		// ]);

		$email = new Email('default');
		$email->setTransport('default')
			// ->setTransport('gmail')
			// ->setFrom(['me@example.com' => 'My Site'])
		    ->setTo('steppe.ego@gmail.com')
		    ->setSubject('Cron Email')
		    ->send('Cron Email');
    }
}
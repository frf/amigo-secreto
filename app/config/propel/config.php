<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('amigosecreto', 'pgsql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'pgsql:host=localhost;dbname=amigosecreto',
  'user' => 'amigosecreto',
  'password' => 'amigosecreto',
));
$manager->setName('amigosecreto');
$serviceContainer->setConnectionManager('amigosecreto', $manager);
$serviceContainer->setDefaultDatasource('amigosecreto');
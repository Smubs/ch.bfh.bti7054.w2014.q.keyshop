<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger,
    Doctrine\ORM\Mapping\Driver\YamlDriver;

class Doctrine
{
    public $em = null;

    public function __construct()
    {
        // load database configuration from CodeIgniter
        require APPPATH . 'config/database.php';

        // Set up class loading. You could use different autoloaders, provided by your favorite framework,
        // if you want to.
        require_once APPPATH . 'libraries/Doctrine/Common/ClassLoader.php';

        $doctrineClassLoader = new ClassLoader('Doctrine', APPPATH . 'libraries');
        $doctrineClassLoader->register();
        $doctrineClassLoader = new ClassLoader('Symfony', APPPATH . 'libraries');
        $doctrineClassLoader->register();
        $doctrineClassLoader = new ClassLoader('Entity', APPPATH . 'models');
        $doctrineClassLoader->register();
        $doctrineClassLoader = new ClassLoader('Repository', APPPATH . 'models');
        $doctrineClassLoader->register();

        // Set up caches
        $config = new Configuration;
        $cache = new ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH . 'models/Entity'));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);

        $config->setQueryCacheImpl($cache);

        // Proxy configuration
        $config->setProxyDir(APPPATH . '/models/Proxy');
        $config->setProxyNamespace('Proxy');

        $driver = new YamlDriver(array(APPPATH . '/models/Yaml'));
        $config->setMetadataDriverImpl($driver);

        // Set up logger
        /*$logger = new EchoSQLLogger;
        $config->setSQLLogger($logger);*/

        $config->setAutoGenerateProxyClasses(true);

        // Database connection information
        $connectionOptions = array(
            'driver'   => 'pdo_mysql',
            'user'     => $db['default']['username'],
            'password' => $db['default']['password'],
            'host'     => $db['default']['hostname'],
            'dbname'   => $db['default']['database'],
            'charset'  => $db['default']['char_set'],
        );

        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);
    }
}

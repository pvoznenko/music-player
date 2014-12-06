<?php
namespace app;

/**
 * Class Singleton
 */
abstract class Singleton
{
    /**
     * array containing the singleton instances
     *
     * @var array
     */
    protected static $instances = array();

    /**
     * Singleton constructor
     *
     * This method is protected in order to deny direct object instantiation outside this class and the ones
     * which extends it
     *
     * @return Singleton
     */
    protected function __construct()
    {

    }

    /**
     * Method used to retrieve singleton instances
     *
     * if the singleton instance already exists returns it, otherwise creates an instance and returns it
     *
     * @return mixed the singleton instance
     */
    public static function getInstance()
    {
        $className = get_called_class();

        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }

    /**
     * Clone method
     *
     * Singleton cloning is denied
     *
     * @throws Exception
     */
    public function __clone()
    {
        throw new Exception('Can not __clone singleton! :: ' . __LINE__);
    }

    /**
     * Sleep method
     *
     * Singleton serialization is denied
     *
     * @throws Exception
     */
    public function __sleep()
    {
        throw new Exception('Can not __sleep singleton! ' . get_called_class() . ' :: ' . __LINE__);
    }

    /**
     * Wakeup method
     *
     * Singleton serialization is denied
     *
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception('Can not __wakeup singleton! ' . get_called_class() . ' :: '. __LINE__);
    }
}
<?php

namespace Remote;

use Exception;
use ReflectionClass;

/**
 * Utility for loading remote files
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-07
 *
 * trait FileLoader
 */
trait FileLoader
{
    private $remoteServicePath;
    private $remoteExtensionPath;
    private $remoteModelPath;
    private $remoteResourcePath;

    /**
     * Create a new FileLoader instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @return void
     */
    public function __construct()
    {
        $this->remoteServicePath = env('REMOTE_SERVICE_PATH');
        $this->remoteExtensionPath = env('REMOTE_EXTENSION_PATH');
        $this->remoteModelPath = env('REMOTE_EXTENSION_PATH');
        $this->remoteResourcePath = env('REMOTE_RESOURCE_PATH');

        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Instantiantes an object of a given Service Class from a remote folder on
     * the same server
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param string $service Name of the Service
     * @param array $params list of parameters to be passed to the service
     * constructor
     * @return object Service
     *
     * @throws Exception if the Model could not be loaded
     */
    public function loadRemoteService(
        $service,
        $namespace = false,
        $params = array()
    ) {
        try {
            $service     = $service . 'Service';
            $servicePath = $service;

            if (!empty($namespace)) {
                $servicePath = $namespace . DIRECTORY_SEPARATOR . $service;
                $service     = $namespace . '\\' . $service;
            }

            $resourcePath = $this->remoteServicePath . $servicePath . '.php';

            if (realpath($resourcePath)) {
                require_once $resourcePath;
            } else {
                throw new Exception("cannot load remote services " . $service, E_ERROR);
            }

            return call_user_func_array(
                array(new ReflectionClass($service), 'newInstance'),
                $params
            );
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), E_ERROR);
        }
    }

    /**
     * Instantiantes an object of a given Service Class from a remote folder
     * on the same server
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param string $service Name of the Service
     * @param array $params list of parameters to be passed to the service
     * constructor
     * @return object Service
     *
     * @throws Exception if the Model could not be loaded
     */
    public function loadRemoteModel(
        $model,
        $params = array(),
        $engineNameSpace = 'EngineModel'
    ) {
        try {
            $resourcePath = $this->remoteModelPath . $model . '.model.php';

            if (realpath($resourcePath)) {
                require_once $resourcePath;
            } else {
                throw new Exception(
                    "cannot load outer model from $engineNameSpace namespace and " . $model,
                    E_ERROR
                );
            }

            return call_user_func_array(
                array(new ReflectionClass($engineNameSpace . '\\' . $model), 'newInstance'),
                $params
            );
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Instantiantes an object of a given Service Class from a remote folder
     * on the same server
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param string $service Name of the Service
     * @param array $params list of parameters to be passed to the service constructor
     * @return object Service
     *
     * @throws Exception if the Model could not be loaded
     */
    protected function loadRemoteExtension($extension, $params = array())
    {
        try {
            $resourcePath = $this->remoteExtensionPath . $extension . '.php';

            if (realpath($resourcePath)) {
                require_once $resourcePath;
            } else {
                throw new Exception(
                    "cannot load extension " . $extension,
                    E_ERROR
                );
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Function for autoloading classes
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param string $className
     * @throws Exception if the class could not be loaded
     */
    public function autoload($className)
    {
        try {
            //try to include a class file directly from Remote directory
            $resourcePath = base_path() . $this->remoteResourcePath
                . $className . ".php";

            if (realpath($resourcePath)) {
                require_once $resourcePath;
            } elseif ($className === 'DatabaseConnection' ||
                $className === 'DBConnectionRateManager' ||
                $className === 'GroupDatabaseConnection'
            ) {
                $resourcePath    = $this->remoteServicePath . $className . '.php';

                if (realpath($resourcePath)) {
                    require_once $resourcePath;
                } else {
                    throw new Exception(
                        "cannot load class " . $className . " from " . $resourcePath,
                        E_ERROR
                    );
                }
            } elseif (strpos($className, 'VO') === 0) {
                $resourcePath = $this->remoteServicePath . '../VO/' . $className . '.php';

                if (realpath($resourcePath)) {
                    require_once $resourcePath;
                } else {
                    throw new Exception(
                        "cannot load class " . $className . " from " . $resourcePath,
                        E_ERROR
                    );
                }
            } elseif (strpos($className, 'Service') != false) {
                $resourcePath = $this->remoteServicePath . $className . '.php';

                if (realpath($resourcePath)) {
                    require_once $resourcePath;
                } else {
                    throw new Exception(
                        "cannot load class " . $className . " from " . $resourcePath,
                        E_ERROR
                    );
                }
            } elseif (strpos($className, 'Httpful') == 0) {
                $resourcePath = $this->remoteExtensionPath . $className . '.php';
                $resourcePath = str_replace('\\', DIRECTORY_SEPARATOR, $resourcePath);

                if (realpath($resourcePath)) {
                    require_once $resourcePath;
                } else {
                    throw new Exception(
                        "cannot load class " . $className . " from " . $resourcePath,
                        E_ERROR
                    );
                }
            } else {
                //try to decode a path from the class file name
                $path = substr($className, 0, strripos($className, '_'));
                $realPath = str_replace('_', DIRECTORY_SEPARATOR, $path);

                $resourcePath = base_path() . $this->remoteResourcePath
                    . $realPath . DIRECTORY_SEPARATOR . $className . ".php";

                if (realpath($resourcePath)) {
                    require_once $resourcePath;
                } else {
                    throw new Exception(
                        "cannot load class " . $className . " from Remote directory",
                        E_ERROR
                    );
                }
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), E_ERROR);
        }
    }
}

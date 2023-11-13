<?php
/**
 * Class DataBaseManager
 * 
 * This Class provides a common interface to interact with the DataBase
 * 
 * @author San Teelock Ramguttee
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-10
 */
class DatabaseManager 
{

    private static $obj_pdo;
    private static $prefix;
    
    public function __construct()
    {
        self::connect();
    }

    public function getInstance()
    {
        return self::$obj_pdo;
    }
    
    /** 
     * getSQL
     * @author San Ramguttee <san.ramguttee@phpml.com>
     * @since 2016-12-09
     */
    public static function debug($sql, $values = array())
    {
        if(empty($values)) {
            
        } else {
            foreach ($values as $key => $value) {
                $sql = preg_replace('/[?]/i', $value, $sql, 1);
            }
        }

        return $sql;
    }

    /**
     * Connects to the database with given global configuration parameters 
     */
    public static function connect()
    {
        if (is_null(self::$obj_pdo))
        {
            $dbHost = env('DB_HOST');
            $dbPort = env('DB_PORT');
            $dbName = env('DB_DATABASE');
            $dbUsername = env('DB_USERNAME');
            $dbPassword = env('DB_PASSWORD');
            $dbPrefix = env('DB_PREFIX');
            $dbErrorReporting = env('DB_ERROR_REPORTING');
            
            if (!empty($dbPort)) {
                $dbPort .= 'port=' . $dbPort . ';';
            }
           
            self::$prefix = $dbPrefix;

            try {
                self::$obj_pdo = new PDO(
                    'mysql:host=' . $dbHost . ';' . $dbPort . 'dbname=' . $dbName,
                    $dbUsername,
                    $dbPassword,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
                );

                if ($dbErrorReporting) {
                    self::$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, true);
                }
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    /**
     * Insert into the database
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return int $lastInsertId 
     */
    public static function insert($sql, $arrValues = null) {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;
        $obj_stmt->execute($arrValues);

        return self::lastInsertId();
    }

    /**
     * Fetch by className return object
     * @author San Ramguttee <san.ramguttee@phpml.com>
     * @since 2019-01-25
     */
    public static function fetchAsObject($sql, $arrValues = null, $className)
    {
        return self::fetch($sql, $arrValues, $className);
    }

    /**
     * Fetch a single row from the database given an sql statement
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return Array $row 
     */
    public static function fetch($sql, $arrValues = null, $className = false) {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;
        $obj_stmt->execute($arrValues);
       
        if (!empty($className)) {
            $obj_stmt->setFetchMode(PDO::FETCH_CLASS, $className); 
            return $obj_stmt->fetch();
        }

        return $obj_stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    /**
     * Fetch multiple rows from the database given an SQL Statement
     * @author San Ramguttee <san.ramguttee@phpml.com>
     * @since 2016-12-22
     * @param String $sql
     * @param Array $arrValues
     * @param String $className 
     * @return Array $rows 
     */
    public static function fetchAllAsObject($sql, $arrValues = null, $className)
    {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;
        $obj_stmt->execute($arrValues);

        return $obj_stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }

    /**
     * Fetch multiple rows from the database given an SQL Statement
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return Array $rows 
     */
    public static function fetchall($sql, $arrValues = null, $fetchType = PDO::FETCH_ASSOC) {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;
        $obj_stmt->execute($arrValues);
       
        return $obj_stmt->fetchAll($fetchType);
    }

    /**
     * Delete from the database given an sql Statement
     * 
     * @param String $sql
     * @param Array $arrValues 
     */
    public static function delete($sql, $arrValues = null) {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;
        return $obj_stmt->execute($arrValues);
    }

    /**
     * Update the database given an SQL statement
     * @param String $sql
     * @param Array $arrValues 
     */
    public static function update($sql, $arrValues = null) {
        self::connect();

        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        if (empty($arrValues))
            $arrValues = null;

        $obj_stmt->execute($arrValues);

        $rowAffected     = $obj_stmt->rowCount();

        if (!empty($rowAffected)) {
            return true;
        }

        return false;
    }

    /**
     * Fetch multiple rows from the database given an SQL Statement
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return Array $rows 
     */
    public static function _fetchAllAsObject($sql, $arrValues = null, $className = false)
    {
        self::connect();
        self::$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, false);
        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        
        if (empty($arrValues))
            $arrValues = null;
        
        $stmt = $obj_stmt->execute($arrValues);
        if (!$stmt) {
            $error = implode(', ',$obj_stmt->errorInfo());
            throw new Exception($error);
        }

        if (!$className) $className = 'stdClass';

        return $obj_stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }

    /**
     * Fetch a single row from the database given an sql statement
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return Array $row 
     */
    public static function _fetchAsObject($sql, $arrValues = null, $className = false) {
        self::connect();
        self::$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, false);
        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        
        if (empty($arrValues))
            $arrValues = null;
            
        $stmt = $obj_stmt->execute($arrValues);
        if (!$stmt) {
            $error = implode(', ',$obj_stmt->errorInfo());
            throw new Exception($error);
        }
       
        if (!empty($className)) {
            $obj_stmt->setFetchMode(PDO::FETCH_CLASS, $className); 
            return $obj_stmt->fetch();
        }

        return $obj_stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update the database given an SQL statement
     * @param String $sql
     * @param Array $arrValues 
     */
    public static function _update($sql, $arrValues = null) {
        self::connect();
        self::$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, false);
        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
       
        if (empty($arrValues))
            $arrValues = null;
        
        $stmt = $obj_stmt->execute($arrValues);
        
        if (!$stmt) {
            $error = implode(', ',$obj_stmt->errorInfo());
            throw new Exception($error);
        }

        $rowAffected     = $obj_stmt->rowCount();

        if (!empty($rowAffected)) {
            return true;
        }

        return false;
    }

    /**
     * Insert into the database
     * 
     * @param String $sql
     * @param Array $arrValues
     * @return int $lastInsertId 
     */
    public static function _insert($sql, $arrValues = null) {
        self::connect();
        self::$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, false);
        $obj_stmt = self::$obj_pdo->prepare(self::prefixTables($sql));
        
        if (empty($arrValues))
            $arrValues = null;

        $stmt = $obj_stmt->execute($arrValues);
        
        if (!$stmt) {
            $error = implode(', ',$obj_stmt->errorInfo());
            throw new Exception($error);
        }

        return self::lastInsertId();
    }

    /**
     * Get last inserted ID
     * 
     * @return int $lastInsertId 
     */
    static function lastInsertId() {
        return self::$obj_pdo->lastInsertId();
    }
    
    /**
     * Prefixes all table names in a given SQL Statement with the prefix provided 
     * in the global configuration file
     * 
     * @param string $sql
     * @return type
     */
    private static function prefixTables($sql) {
        return strtr($sql, array('{' => self::$prefix, '}' => ''));
    }
}

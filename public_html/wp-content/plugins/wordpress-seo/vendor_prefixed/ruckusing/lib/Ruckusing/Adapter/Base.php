<?php

namespace YoastSEO_Vendor;

/**
 * Ruckusing
 *
 * @category  Ruckusing
 * @package   Ruckusing_Adapter
 * @author    Cody Caughlan <codycaughlan % gmail . com>
 * @link      https://github.com/ruckus/ruckusing-migrations
 */
\define('YoastSEO_Vendor\\SQL_UNKNOWN_QUERY_TYPE', 1);
\define('YoastSEO_Vendor\\SQL_SELECT', 2);
\define('YoastSEO_Vendor\\SQL_INSERT', 4);
\define('YoastSEO_Vendor\\SQL_UPDATE', 8);
\define('YoastSEO_Vendor\\SQL_DELETE', 16);
\define('YoastSEO_Vendor\\SQL_ALTER', 32);
\define('YoastSEO_Vendor\\SQL_DROP', 64);
\define('YoastSEO_Vendor\\SQL_CREATE', 128);
\define('YoastSEO_Vendor\\SQL_SHOW', 256);
\define('YoastSEO_Vendor\\SQL_RENAME', 512);
\define('YoastSEO_Vendor\\SQL_SET', 1024);
/**
 * Ruckusing_Adapter_Base
 *
 * @category Ruckusing
 * @package  Ruckusing_Adapter
 * @author   Cody Caughlan <codycaughlan % gmail . com>
 * @link      https://github.com/ruckus/ruckusing-migrations
 */
class Ruckusing_Adapter_Base
{
    /**
     * dsn
     *
     * @var array
     */
    private $_dsn;
    /**
     * db
     *
     */
    private $_db;
    /**
     * connection to db
     *
     * @var object|mysqli
     */
    protected $_conn;
    /**
     * logger
     *
     * @var Ruckusing_Util_Logger
     */
    public $logger;
    /**
     * Creates an instance of Ruckusing_Adapter_Base
     *
     * @param array $dsn The current dsn
     *
     * @return Ruckusing_Adapter_Base
     */
    public function __construct($dsn)
    {
        $this->set_dsn($dsn);
    }
    /**
     * Set a dsn
     *
     * @param object $dsn The current dsn
     */
    public function set_dsn($dsn)
    {
        $this->_dsn = $dsn;
    }
    /**
     * Get the current dsn
     *
     * @return array
     */
    public function get_dsn()
    {
        return $this->_dsn;
    }
    /**
     * Set a db
     *
     * @param array $db The current db
     */
    public function set_db($db)
    {
        $this->_db = $db;
    }
    /**
     * Get the current db
     *
     * @return array
     */
    public function get_db()
    {
        return $this->_db;
    }
    /**
     * Set a logger
     *
     * @param Ruckusing_Util_Logger $logger The current logger
     * @throws Ruckusing_Exception
     */
    public function set_logger($logger)
    {
        if (!$logger instanceof \YoastSEO_Vendor\Ruckusing_Util_Logger) {
            throw new \YoastSEO_Vendor\Ruckusing_Exception('Logger parameter must be instance of Ruckusing_Util_Logger', \YoastSEO_Vendor\Ruckusing_Exception::INVALID_ARGUMENT);
        }
        $this->logger = $logger;
    }
    /**
     * Get the current logger
     *
     * @param $logger
     * @return Ruckusing_Util_Logger
     */
    public function get_logger($logger)
    {
        return $this->logger;
    }
    /**
     * Check table exists
     *
     * @param string $tbl the table name
     *
     * @return boolean
     */
    public function has_table($tbl)
    {
        return $this->table_exists($tbl);
    }
    /**
     * Allows to override hardcoded schema table name constant in case of parallel migrations.
     *
     * @return string
     */
    public function get_schema_version_table_name()
    {
        if (isset($this->_dsn['schema_version_table_name'])) {
            return $this->_dsn['schema_version_table_name'];
        }
        return \YoastSEO_Vendor\RUCKUSING_TS_SCHEMA_TBL_NAME;
    }
}

<?php
/**
 * Copyright © 2016 Foggyline. All rights reserved.
 */

namespace Foggyline\Sentinel\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()
            ->newTable($setup->getTable('foggyline_sentinel_access_log'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'request_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Unique HTTP request ID'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'user_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true],
                'Modified by User ID'
            )
            ->addColumn(
                'user_username',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'User Username'
            )
            ->addColumn(
                'user_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'User Email'
            )
            ->addColumn(
                'user_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'User Full Name'
            )
            ->addColumn(
                'action_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Action Name'
            )
            ->addColumn(
                'full_action_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Full Action Name'
            )
            ->addColumn(
                'client_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Client IP'
            )
            ->addColumn(
                'country_by_geo_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Country by GEO IP'
            )
            ->addColumn(
                'request_string',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Request String'
            )
            ->addColumn(
                'request_method',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Request Method'
            )
            ->addColumn(
                'http_get_params',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'HTTP GET Params'
            )
            ->addColumn(
                'http_post_params',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'HTTP POST Params'
            )
            ->addColumn(
                'http_files_params',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'HTTP FILES Params'
            )
            ->addColumn(
                'module_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Module Name'
            )
            ->addColumn(
                'controller_module',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Controller Module'
            )
            ->addColumn(
                'area',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Area'
            )
            ->setComment('Foggyline Sentinel Log Table');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('foggyline_sentinel_login_log'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'request_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Unique HTTP request ID'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true],
                'Store ID'
            )
            ->addColumn(
                'type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Type (user, customer, rest_api, soap_api)'
            )
            ->addColumn(
                'identifier',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Identifier'
            )
            ->addColumn(
                'login_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Login Status'
            )
            ->setComment('Foggyline Sentinel Login Log Table');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('foggyline_sentinel_curl_log'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'request_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Unique HTTP request ID'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true],
                'Store ID'
            )
            ->addColumn(
                'result',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Result'
            )
            ->addColumn(
                'method',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Method'
            )
            ->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Url'
            )
            ->addColumn(
                'http_ver',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'HTTP version'
            )
            ->addColumn(
                'headers',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Headers'
            )
            ->addColumn(
                'body',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'body'
            )
            ->addColumn(
                'http_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'HTTP Code'
            )
            ->addColumn(
                'total_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Total Time'
            )
            ->addColumn(
                'name_lookup_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'name_lookup_time'
            )
            ->addColumn(
                'primary_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Primary IP'
            )
            ->addColumn(
                'primary_port',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Primary Port'
            )
            ->addColumn(
                'local_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Local IP'
            )
            ->addColumn(
                'local_port',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Local Port'
            )
            ->addColumn(
                'size_upload',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Size Upload'
            )
            ->addColumn(
                'size_download',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Size Download'
            )
            ->addColumn(
                'speed_download',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Speed Download'
            )
            ->addColumn(
                'speed_upload',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Speed Upload'
            )
            ->addColumn(
                'content_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Content Type'
            )
            ->setComment('Foggyline Sentinel cURL Log Table');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('foggyline_sentinel_query_log'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true],
                'Type'
            )
            ->addColumn(
                'time',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Time'
            )
            ->addColumn(
                'sql',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'SQL'
            )
            ->addColumn(
                'bind',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Bind'
            )
            ->addColumn(
                'row_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Row Count'
            )
            ->addColumn(
                'request_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Unique HTTP request ID'
            )
            ->addColumn(
                'backtrace',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Backtrace'
            )
            ->setComment('Foggyline Sentinel Login Log Table');
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}

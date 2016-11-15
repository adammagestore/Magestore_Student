<?php
/**
 * Magestore
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Magestore
 * @package     Magestore_Student
 * @copyright   Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license     http://www.magestore.com/license-agreement.html
 */

namespace Magestore\Student\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Magestore\Student\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer = $setup;
        $installer->startSetup();
        $setup->getConnection()->dropTable($setup->getTable('student'));

        $table = $installer->getConnection()->newTable(
            $installer->getTable('student')
                )->addColumn(
                    'student_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    NULL,
                    ['identity' => TRUE, 'unsigned' => TRUE, 'nullable' => FALSE, 'primary' => TRUE],
                    'Student ID'
                )->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    ['nullable' => FALSE, 'default' => ''],
                    'Student Name'
                )->addColumn(
                    'class',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    ['nullable' => FALSE, 'default' => ''],
                    'Class name'
                )->addColumn(
                    'university',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    ['nullable' => FALSE, 'default' => ''],
                    'University'
                );
        $installer->getConnection()->createTable($table);
    }
}
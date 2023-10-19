<?php

namespace Magedia\WhiteList\Setup;

use Magedia\WhiteList\Api\Data\WhiteListInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context): void
    {
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->getConnection()->isTableExists(WhiteListInterface::DB_NAME)) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable(WhiteListInterface::DB_NAME))
                ->addColumn(
                    WhiteListInterface::ID,
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Id'
                )
                ->addColumn(
                    WhiteListInterface::IP_ADDRESS,
                    Table::TYPE_TEXT,
                    15,
                    ['nullable' => false],
                    'Ip address'
                )
                ->addColumn(
                    WhiteListInterface::IS_ALLOWED,
                    Table::TYPE_BOOLEAN,
                    null,
                    ['nullable' => false],
                    'Is allowed'
                )
                ->addColumn(
                    WhiteListInterface::DESCRIPTION,
                    Table::TYPE_TEXT,
                    255,
                    [],
                    'Description'
                )
                ->setComment('White list ip');

            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable(WhiteListInterface::DB_NAME),
                $setup->getIdxName(
                    $installer->getTable(WhiteListInterface::DB_NAME),
                    [WhiteListInterface::IP_ADDRESS],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                [WhiteListInterface::IP_ADDRESS],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}

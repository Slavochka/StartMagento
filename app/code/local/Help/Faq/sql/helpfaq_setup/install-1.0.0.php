<?php

$installer = $this;
$tableFaq = $installer->getTable('helpfaq/table_faq');

$installer->startSetup();

$installer->getConnection()->dropTable($tableFaq);
$table = $installer->getConnection()
    ->newTable($tableFaq)
    ->addColumn('faq_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, '50', array(
        'nullable'  => false,
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, '50', array(
        'nullable'  => false,
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, '250', array(
        'nullable'  => true,
    ))
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, '1', array(
        'nullable'  => false,
    ))
    ->addColumn('created', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);

$installer->endSetup();
<?php
/**
 * Created by PhpStorm.
 * User: Vladislava
 * Date: 05.07.2016
 * Time: 20:21
 */

$installer = $this;

$installer->startSetup();

$installer->run("CREATE TABLE help_faq_entities (
        `faq_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `content` TEXT NOT NULL,
        `status` INT(1) NOT NULL,
        `created` DATETIME NOT NULL,

        PRIMARY KEY (`faq_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup();
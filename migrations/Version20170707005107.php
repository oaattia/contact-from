<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170707005107 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('visitors');
        $table->addColumn(
            'id',
            'integer',
            ['unsigned' => true, 'autoincrement' => true]
        );
        $table->addColumn('name', 'string', ['length' => 60]);
        $table->addColumn('email', 'string', ['length' => 60]);
        $table->addColumn('message', 'text');
        $table->setPrimaryKey(['id']);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('visitors');
    }
}

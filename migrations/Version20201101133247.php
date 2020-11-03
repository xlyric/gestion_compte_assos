<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101133247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE codeposte codeposte INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD updated_at DATETIME NOT NULL, CHANGE codecompta_id codecompta_id INT DEFAULT NULL, CHANGE client_id client_id INT DEFAULT NULL, CHANGE comptable_id comptable_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE ville ville INT DEFAULT NULL, CHANGE codeposte codeposte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE compte DROP updated_at, CHANGE codecompta_id codecompta_id INT NOT NULL, CHANGE client_id client_id INT NOT NULL, CHANGE comptable_id comptable_id INT NOT NULL');
    }
}

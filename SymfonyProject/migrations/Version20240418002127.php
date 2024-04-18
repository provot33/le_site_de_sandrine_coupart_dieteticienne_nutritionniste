<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418002127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_organisation ADD webcontent_id INT NOT NULL');
        $this->addSql('ALTER TABLE page_organisation ADD CONSTRAINT FK_58FD9EFA1790C324 FOREIGN KEY (webcontent_id) REFERENCES web_content (id)');
        $this->addSql('CREATE INDEX IDX_58FD9EFA1790C324 ON page_organisation (webcontent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_organisation DROP FOREIGN KEY FK_58FD9EFA1790C324');
        $this->addSql('DROP INDEX IDX_58FD9EFA1790C324 ON page_organisation');
        $this->addSql('ALTER TABLE page_organisation DROP webcontent_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418013905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE page_organisation DROP FOREIGN KEY FK_58FD9EFA1790C324');
        $this->addSql('DROP INDEX IDX_58FD9EFA1790C324 ON page_organisation');
        $this->addSql('ALTER TABLE page_organisation CHANGE webcontent_id web_content_id INT NOT NULL');
        $this->addSql('ALTER TABLE page_organisation ADD CONSTRAINT FK_58FD9EFA5C019E1 FOREIGN KEY (web_content_id) REFERENCES web_content (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58FD9EFA5C019E1 ON page_organisation (web_content_id)');
        $this->addSql('ALTER TABLE web_content DROP FOREIGN KEY FK_166A9E371B3AE943');
        $this->addSql('DROP INDEX IDX_166A9E371B3AE943 ON web_content');
        $this->addSql('ALTER TABLE web_content DROP page_organisations_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page CHANGE name name VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE page_organisation DROP FOREIGN KEY FK_58FD9EFA5C019E1');
        $this->addSql('DROP INDEX UNIQ_58FD9EFA5C019E1 ON page_organisation');
        $this->addSql('ALTER TABLE page_organisation CHANGE web_content_id webcontent_id INT NOT NULL');
        $this->addSql('ALTER TABLE page_organisation ADD CONSTRAINT FK_58FD9EFA1790C324 FOREIGN KEY (webcontent_id) REFERENCES web_content (id)');
        $this->addSql('CREATE INDEX IDX_58FD9EFA1790C324 ON page_organisation (webcontent_id)');
        $this->addSql('ALTER TABLE web_content ADD page_organisations_id INT NOT NULL');
        $this->addSql('ALTER TABLE web_content ADD CONSTRAINT FK_166A9E371B3AE943 FOREIGN KEY (page_organisations_id) REFERENCES page_organisation (id)');
        $this->addSql('CREATE INDEX IDX_166A9E371B3AE943 ON web_content (page_organisations_id)');
    }
}

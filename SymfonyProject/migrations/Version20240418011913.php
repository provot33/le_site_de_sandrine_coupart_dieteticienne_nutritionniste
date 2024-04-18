<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418011913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE web_content ADD page_organisations_id INT NOT NULL');
        $this->addSql('ALTER TABLE web_content ADD CONSTRAINT FK_166A9E371B3AE943 FOREIGN KEY (page_organisations_id) REFERENCES page_organisation (id)');
        $this->addSql('CREATE INDEX IDX_166A9E371B3AE943 ON web_content (page_organisations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE web_content DROP FOREIGN KEY FK_166A9E371B3AE943');
        $this->addSql('DROP INDEX IDX_166A9E371B3AE943 ON web_content');
        $this->addSql('ALTER TABLE web_content DROP page_organisations_id');
    }
}

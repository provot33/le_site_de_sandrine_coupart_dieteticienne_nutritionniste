<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418011111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page_organisation (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, webcontent_id INT NOT NULL, level SMALLINT NOT NULL, place_in_page INT NOT NULL, INDEX IDX_58FD9EFAC4663E4 (page_id), INDEX IDX_58FD9EFA1790C324 (webcontent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) DEFAULT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page_organisation ADD CONSTRAINT FK_58FD9EFAC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE page_organisation ADD CONSTRAINT FK_58FD9EFA1790C324 FOREIGN KEY (webcontent_id) REFERENCES web_content (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_organisation DROP FOREIGN KEY FK_58FD9EFAC4663E4');
        $this->addSql('ALTER TABLE page_organisation DROP FOREIGN KEY FK_58FD9EFA1790C324');
        $this->addSql('DROP TABLE page_organisation');
        $this->addSql('DROP TABLE web_content');
    }
}

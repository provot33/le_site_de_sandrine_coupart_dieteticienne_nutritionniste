<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240417231324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allergen (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentary (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, patient_id INT NOT NULL, title VARCHAR(50) NOT NULL, commentary LONGTEXT NOT NULL, INDEX IDX_1CAC12CA59D8A214 (recipe_id), INDEX IDX_1CAC12CA6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_allergen (ingredient_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_57B95840933FE08C (ingredient_id), INDEX IDX_57B958406E775A4A (allergen_id), PRIMARY KEY(ingredient_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, diet_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, email VARCHAR(80) NOT NULL, password VARCHAR(150) NOT NULL, INDEX IDX_1ADAD7EBE1E13ACE (diet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_allergen (patient_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_123A506B6B899279 (patient_id), INDEX IDX_123A506B6E775A4A (allergen_id), PRIMARY KEY(patient_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(60) NOT NULL, description VARCHAR(255) NOT NULL, preparation_time TIME NOT NULL, rest_time TIME NOT NULL, cooking_time TIME NOT NULL, steps LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_diet (recipe_id INT NOT NULL, diet_id INT NOT NULL, INDEX IDX_E2FF3FFF59D8A214 (recipe_id), INDEX IDX_E2FF3FFFE1E13ACE (diet_id), PRIMARY KEY(recipe_id, diet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_uses_ingredient (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, ingredient_id INT NOT NULL, quantity INT NOT NULL, unity VARCHAR(20) NOT NULL, INDEX IDX_3E19A79F59D8A214 (recipe_id), INDEX IDX_3E19A79F933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) DEFAULT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE ingredient_allergen ADD CONSTRAINT FK_57B95840933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_allergen ADD CONSTRAINT FK_57B958406E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBE1E13ACE FOREIGN KEY (diet_id) REFERENCES diet (id)');
        $this->addSql('ALTER TABLE patient_allergen ADD CONSTRAINT FK_123A506B6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_allergen ADD CONSTRAINT FK_123A506B6E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_diet ADD CONSTRAINT FK_E2FF3FFF59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_diet ADD CONSTRAINT FK_E2FF3FFFE1E13ACE FOREIGN KEY (diet_id) REFERENCES diet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_uses_ingredient ADD CONSTRAINT FK_3E19A79F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_uses_ingredient ADD CONSTRAINT FK_3E19A79F933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentary DROP FOREIGN KEY FK_1CAC12CA59D8A214');
        $this->addSql('ALTER TABLE commentary DROP FOREIGN KEY FK_1CAC12CA6B899279');
        $this->addSql('ALTER TABLE ingredient_allergen DROP FOREIGN KEY FK_57B95840933FE08C');
        $this->addSql('ALTER TABLE ingredient_allergen DROP FOREIGN KEY FK_57B958406E775A4A');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBE1E13ACE');
        $this->addSql('ALTER TABLE patient_allergen DROP FOREIGN KEY FK_123A506B6B899279');
        $this->addSql('ALTER TABLE patient_allergen DROP FOREIGN KEY FK_123A506B6E775A4A');
        $this->addSql('ALTER TABLE recipe_diet DROP FOREIGN KEY FK_E2FF3FFF59D8A214');
        $this->addSql('ALTER TABLE recipe_diet DROP FOREIGN KEY FK_E2FF3FFFE1E13ACE');
        $this->addSql('ALTER TABLE recipe_uses_ingredient DROP FOREIGN KEY FK_3E19A79F59D8A214');
        $this->addSql('ALTER TABLE recipe_uses_ingredient DROP FOREIGN KEY FK_3E19A79F933FE08C');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE allergen');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('DROP TABLE diet');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_allergen');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patient_allergen');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_diet');
        $this->addSql('DROP TABLE recipe_uses_ingredient');
        $this->addSql('DROP TABLE web_content');
    }
}

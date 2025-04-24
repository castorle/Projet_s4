<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417165632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE maintenance_log (id INT AUTO_INCREMENT NOT NULL, plant_id INT NOT NULL, date DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_26CA3DF31D935652 (plant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, common_name VARCHAR(255) NOT NULL, scientific_name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, cycle VARCHAR(255) NOT NULL, hardiness_zone INT NOT NULL, maintenance_difficulty VARCHAR(255) NOT NULL, watering_needs VARCHAR(255) NOT NULL, soil_type VARCHAR(255) NOT NULL, flowering_season VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log ADD CONSTRAINT FK_26CA3DF31D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log DROP FOREIGN KEY FK_26CA3DF31D935652
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE maintenance_log
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE plant
        SQL);
    }
}

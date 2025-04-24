<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424095256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log ADD user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log ADD CONSTRAINT FK_26CA3DF3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_26CA3DF3A76ED395 ON maintenance_log (user_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log DROP FOREIGN KEY FK_26CA3DF3A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_26CA3DF3A76ED395 ON maintenance_log
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE maintenance_log DROP user_id
        SQL);
    }
}

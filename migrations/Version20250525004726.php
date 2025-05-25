<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250525004726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_33A04BAECDEADB2A ON agency_members (agency_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_33A04BAE3414710B ON agency_members (agent_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX agency_agent_unique ON agency_members (agency_id, agent_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE properties DROP gallery_pictures
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE agency_members DROP FOREIGN KEY FK_33A04BAECDEADB2A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agency_members DROP FOREIGN KEY FK_33A04BAE3414710B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_33A04BAECDEADB2A ON agency_members
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_33A04BAE3414710B ON agency_members
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX agency_agent_unique ON agency_members
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE properties ADD gallery_pictures JSON DEFAULT NULL
        SQL);
    }
}

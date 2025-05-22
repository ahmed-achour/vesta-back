<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522023726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE admin_users CHANGE is_superadmin is_superadmin TINYINT(1) DEFAULT NULL, CHANGE failed_attempts failed_attempts INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agency CHANGE total_sales total_sales INT DEFAULT NULL, CHANGE twelve_month_sales twelve_month_sales INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agency_members CHANGE is_lead is_lead TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agents CHANGE years_experience years_experience INT DEFAULT NULL, CHANGE review_count review_count INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE bathrooms CHANGE full_bathrooms full_bathrooms INT DEFAULT NULL, CHANGE three_quarter_bathrooms three_quarter_bathrooms INT DEFAULT NULL, CHANGE half_bathrooms half_bathrooms INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE bedrooms CHANGE area area INT DEFAULT NULL, CHANGE width width INT DEFAULT NULL, CHANGE length length INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE community CHANGE walk_score walk_score INT DEFAULT NULL, CHANGE bike_score bike_score INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE construction CHANGE builder_name builder_name VARCHAR(100) DEFAULT NULL, CHANGE new_construction new_construction TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exterior_features CHANGE spa spa TINYINT(1) DEFAULT NULL, CHANGE spa_features spa_features VARCHAR(100) DEFAULT NULL, CHANGE waterfront waterfront VARCHAR(100) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interior_features CHANGE appliances appliances VARCHAR(500) DEFAULT NULL, CHANGE fireplace_locations fireplace_locations VARCHAR(255) DEFAULT NULL, CHANGE ceiling_fan ceiling_fan TINYINT(1) DEFAULT NULL, CHANGE eat_in_kitchen eat_in_kitchen TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE listings CHANGE featured featured TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parking CHANGE total_spaces total_spaces INT DEFAULT NULL, CHANGE attached_garage_spaces attached_garage_spaces INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE properties CHANGE city city VARCHAR(100) DEFAULT NULL, CHANGE zip_code zip_code VARCHAR(10) DEFAULT NULL, CHANGE subdivision subdivision VARCHAR(100) DEFAULT NULL, CHANGE region region VARCHAR(100) DEFAULT NULL, CHANGE structure_area structure_area INT DEFAULT NULL, CHANGE livable_area livable_area INT DEFAULT NULL, CHANGE finished_below_ground finished_below_ground INT DEFAULT NULL, CHANGE mls_id mls_id VARCHAR(50) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews CHANGE approved approved TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rooms CHANGE name name VARCHAR(50) DEFAULT NULL, CHANGE area area INT DEFAULT NULL, CHANGE width width INT DEFAULT NULL, CHANGE length length INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE schools CHANGE name name VARCHAR(150) DEFAULT NULL, CHANGE grades grades VARCHAR(20) DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE system_maintenance CHANGE is_active is_active TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE system_settings CHANGE is_public is_public TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_verifications CHANGE completed completed TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users CHANGE email_verified email_verified TINYINT(1) DEFAULT NULL, CHANGE profile_photo_verified profile_photo_verified TINYINT(1) DEFAULT NULL, CHANGE phone_verified phone_verified TINYINT(1) DEFAULT NULL, CHANGE show_email show_email TINYINT(1) DEFAULT NULL, CHANGE show_phone show_phone TINYINT(1) DEFAULT NULL, CHANGE search_engine_indexing search_engine_indexing TINYINT(1) DEFAULT NULL, CHANGE data_sharing_consent data_sharing_consent TINYINT(1) DEFAULT NULL, CHANGE two_factor_enabled two_factor_enabled TINYINT(1) DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE admin_users CHANGE is_superadmin is_superadmin TINYINT(1) DEFAULT 0, CHANGE failed_attempts failed_attempts INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agency CHANGE total_sales total_sales INT DEFAULT 0, CHANGE twelve_month_sales twelve_month_sales INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agency_members CHANGE is_lead is_lead TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE agents CHANGE years_experience years_experience INT DEFAULT 0, CHANGE review_count review_count INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE bathrooms CHANGE full_bathrooms full_bathrooms INT DEFAULT 0, CHANGE three_quarter_bathrooms three_quarter_bathrooms INT DEFAULT 0, CHANGE half_bathrooms half_bathrooms INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE bedrooms CHANGE area area INT DEFAULT 0, CHANGE width width INT DEFAULT 0, CHANGE length length INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE community CHANGE walk_score walk_score INT DEFAULT 0, CHANGE bike_score bike_score INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE construction CHANGE builder_name builder_name VARCHAR(100) DEFAULT '', CHANGE new_construction new_construction TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exterior_features CHANGE spa spa TINYINT(1) DEFAULT 0, CHANGE spa_features spa_features VARCHAR(100) DEFAULT '', CHANGE waterfront waterfront VARCHAR(100) DEFAULT ''
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interior_features CHANGE appliances appliances VARCHAR(500) DEFAULT '', CHANGE fireplace_locations fireplace_locations VARCHAR(255) DEFAULT '', CHANGE ceiling_fan ceiling_fan TINYINT(1) DEFAULT 0, CHANGE eat_in_kitchen eat_in_kitchen TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE listings CHANGE featured featured TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parking CHANGE total_spaces total_spaces INT DEFAULT 0, CHANGE attached_garage_spaces attached_garage_spaces INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE properties CHANGE city city VARCHAR(100) DEFAULT '', CHANGE zip_code zip_code VARCHAR(10) DEFAULT '', CHANGE subdivision subdivision VARCHAR(100) DEFAULT '', CHANGE region region VARCHAR(100) DEFAULT '', CHANGE structure_area structure_area INT DEFAULT 0, CHANGE livable_area livable_area INT DEFAULT 0, CHANGE finished_below_ground finished_below_ground INT DEFAULT 0, CHANGE mls_id mls_id VARCHAR(50) DEFAULT ''
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews CHANGE approved approved TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rooms CHANGE name name VARCHAR(50) DEFAULT '', CHANGE area area INT DEFAULT 0, CHANGE width width INT DEFAULT 0, CHANGE length length INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE schools CHANGE name name VARCHAR(150) DEFAULT '', CHANGE grades grades VARCHAR(20) DEFAULT '', CHANGE rating rating INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE system_maintenance CHANGE is_active is_active TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE system_settings CHANGE is_public is_public TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_verifications CHANGE completed completed TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users CHANGE email_verified email_verified TINYINT(1) DEFAULT 0, CHANGE profile_photo_verified profile_photo_verified TINYINT(1) DEFAULT 0, CHANGE phone_verified phone_verified TINYINT(1) DEFAULT 0, CHANGE show_email show_email TINYINT(1) DEFAULT 0, CHANGE show_phone show_phone TINYINT(1) DEFAULT 0, CHANGE search_engine_indexing search_engine_indexing TINYINT(1) DEFAULT 0, CHANGE data_sharing_consent data_sharing_consent TINYINT(1) DEFAULT 0, CHANGE two_factor_enabled two_factor_enabled TINYINT(1) DEFAULT 0
        SQL);
    }
}

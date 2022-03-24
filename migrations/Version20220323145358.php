<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323145358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE availability_contact (id INT AUTO_INCREMENT NOT NULL, availability_id INT NOT NULL, day VARCHAR(255) NOT NULL, hour_start VARCHAR(255) NOT NULL, hour_end VARCHAR(255) NOT NULL, INDEX IDX_C3760D9361778466 (availability_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, product_calendar_id INT NOT NULL, date_start DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_end DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6EA9A146A66F3CD7 (product_calendar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) NOT NULL, department VARCHAR(255) NOT NULL, cities VARCHAR(255) NOT NULL, gps_lng NUMERIC(16, 14) NOT NULL, gps_lat NUMERIC(16, 14) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_product (option_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_CBBE13D8A7C41D6F (option_id), INDEX IDX_CBBE13D84584665A (product_id), PRIMARY KEY(option_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_cost (id INT AUTO_INCREMENT NOT NULL, product_option_cost_id INT NOT NULL, option_cost_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_F0283E1F5622EC26 (product_option_cost_id), INDEX IDX_F0283E1F54B920A (option_cost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_owner_id INT NOT NULL, product_contact_id INT NOT NULL, location_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, peak_season_price DOUBLE PRECISION NOT NULL, off_season_price DOUBLE PRECISION NOT NULL, surface INT NOT NULL, room INT NOT NULL, people INT NOT NULL, animal TINYINT(1) NOT NULL, animal_cost DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D34A04ADB58C0B6E (product_owner_id), INDEX IDX_D34A04AD74C67A61 (product_contact_id), INDEX IDX_D34A04AD64D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_contact (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE availability_contact ADD CONSTRAINT FK_C3760D9361778466 FOREIGN KEY (availability_id) REFERENCES product_contact (id)');
        $this->addSql('ALTER TABLE calendar ADD CONSTRAINT FK_6EA9A146A66F3CD7 FOREIGN KEY (product_calendar_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE option_product ADD CONSTRAINT FK_CBBE13D8A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_product ADD CONSTRAINT FK_CBBE13D84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_cost ADD CONSTRAINT FK_F0283E1F5622EC26 FOREIGN KEY (product_option_cost_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE option_cost ADD CONSTRAINT FK_F0283E1F54B920A FOREIGN KEY (option_cost_id) REFERENCES `option` (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB58C0B6E FOREIGN KEY (product_owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD74C67A61 FOREIGN KEY (product_contact_id) REFERENCES product_contact (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY cities_department_code_foreign');
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BD50F57CD FOREIGN KEY (department_code) REFERENCES departments (code)');
        $this->addSql('ALTER TABLE departments DROP FOREIGN KEY departments_region_code_foreign');
        $this->addSql('ALTER TABLE departments CHANGE region_code region_code VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE departments ADD CONSTRAINT FK_16AEB8D4AEB327AF FOREIGN KEY (region_code) REFERENCES regions (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD64D218E');
        $this->addSql('ALTER TABLE option_product DROP FOREIGN KEY FK_CBBE13D8A7C41D6F');
        $this->addSql('ALTER TABLE option_cost DROP FOREIGN KEY FK_F0283E1F54B920A');
        $this->addSql('ALTER TABLE calendar DROP FOREIGN KEY FK_6EA9A146A66F3CD7');
        $this->addSql('ALTER TABLE option_product DROP FOREIGN KEY FK_CBBE13D84584665A');
        $this->addSql('ALTER TABLE option_cost DROP FOREIGN KEY FK_F0283E1F5622EC26');
        $this->addSql('ALTER TABLE availability_contact DROP FOREIGN KEY FK_C3760D9361778466');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD74C67A61');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB58C0B6E');
        $this->addSql('DROP TABLE availability_contact');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE option_product');
        $this->addSql('DROP TABLE option_cost');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_contact');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BD50F57CD');
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE insee_code insee_code VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zip_code zip_code VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT cities_department_code_foreign FOREIGN KEY (department_code) REFERENCES departments (code) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departments DROP FOREIGN KEY FK_16AEB8D4AEB327AF');
        $this->addSql('ALTER TABLE departments CHANGE region_code region_code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE departments ADD CONSTRAINT departments_region_code_foreign FOREIGN KEY (region_code) REFERENCES regions (code) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE regions CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

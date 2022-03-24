<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324100220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departments MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE departments DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE departments CHANGE id id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE departments ADD PRIMARY KEY (code)');
        $this->addSql('ALTER TABLE regions MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE regions DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE regions CHANGE id id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE regions ADD PRIMARY KEY (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE availability_contact CHANGE day day VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE hour_start hour_start VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE hour_end hour_end VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE insee_code insee_code VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zip_code zip_code VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE departments MODIFY code VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE departments DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE departments CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE region_code region_code VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE departments ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE location CHANGE region region VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE department department VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE cities cities VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE `option` CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE product CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8_unicode_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE product_contact CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE tel tel VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE comment comment LONGTEXT DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE regions MODIFY code VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE regions DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE regions CHANGE code code VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regions ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE role role VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE tel tel VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
    }
}

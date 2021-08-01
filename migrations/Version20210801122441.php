<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801122441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, logo LONGTEXT NOT NULL, status VARCHAR(255) DEFAULT NULL, catchphrase LONGTEXT NOT NULL, description LONGTEXT NOT NULL, profile_type LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, facebook LONGTEXT DEFAULT NULL, instagram LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, youtube LONGTEXT DEFAULT NULL, twitch LONGTEXT DEFAULT NULL, discord LONGTEXT DEFAULT NULL, autre LONGTEXT DEFAULT NULL, form LONGTEXT DEFAULT NULL, projects LONGTEXT NOT NULL, thumbnail LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_FD8521CC5E237E06 (name), INDEX IDX_FD8521CC12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CC12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CC12469DE2');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE category');
    }
}

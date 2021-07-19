<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719200153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association ADD email LONGTEXT NOT NULL, ADD facebook LONGTEXT DEFAULT NULL, ADD instagram LONGTEXT DEFAULT NULL, ADD twitter LONGTEXT DEFAULT NULL, ADD youtube LONGTEXT DEFAULT NULL, ADD twitch LONGTEXT DEFAULT NULL, ADD discord LONGTEXT DEFAULT NULL, ADD autre LONGTEXT DEFAULT NULL, ADD form LONGTEXT DEFAULT NULL, CHANGE logo_color logo LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association ADD logo_color LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP logo, DROP email, DROP facebook, DROP instagram, DROP twitter, DROP youtube, DROP twitch, DROP discord, DROP autre, DROP form');
    }
}

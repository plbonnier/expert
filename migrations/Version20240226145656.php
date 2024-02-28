<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226145656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_blog (id INT AUTO_INCREMENT NOT NULL, blog_id INT NOT NULL, photo VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_4124E3B7DAE07E97 (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_user (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, photo VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_CA264BDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_blog ADD CONSTRAINT FK_4124E3B7DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE photo_user ADD CONSTRAINT FK_CA264BDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE blog DROP photo, DROP description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_blog DROP FOREIGN KEY FK_4124E3B7DAE07E97');
        $this->addSql('ALTER TABLE photo_user DROP FOREIGN KEY FK_CA264BDA76ED395');
        $this->addSql('DROP TABLE photo_blog');
        $this->addSql('DROP TABLE photo_user');
        $this->addSql('ALTER TABLE blog ADD photo VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL');
    }
}

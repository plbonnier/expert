<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220084835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, vente_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, lot_numero INT NOT NULL, description LONGTEXT DEFAULT NULL, estimation_basse INT NOT NULL, estimation_haute INT NOT NULL, vendu TINYINT(1) DEFAULT NULL, taille VARCHAR(50) DEFAULT NULL, poids VARCHAR(50) DEFAULT NULL, materiaux VARCHAR(255) DEFAULT NULL, pierre VARCHAR(255) DEFAULT NULL, certificat TINYINT(1) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, INDEX IDX_B81291B7DC7170A (vente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B7DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B7DC7170A');
        $this->addSql('DROP TABLE lot');
    }
}

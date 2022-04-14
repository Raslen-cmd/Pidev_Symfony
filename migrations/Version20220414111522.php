<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414111522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE remise (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, pourcentage INT NOT NULL, ancien_prix DOUBLE PRECISION NOT NULL, nouveau_prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD id_remise_id INT DEFAULT NULL, CHANGE id_client_id id_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DCE721FBE FOREIGN KEY (id_remise_id) REFERENCES remise (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DCE721FBE ON commande (id_remise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DCE721FBE');
        $this->addSql('DROP TABLE remise');
        $this->addSql('DROP INDEX IDX_6EEAA67DCE721FBE ON commande');
        $this->addSql('ALTER TABLE commande DROP id_remise_id, CHANGE id_client_id id_client_id INT DEFAULT NULL');
    }
}

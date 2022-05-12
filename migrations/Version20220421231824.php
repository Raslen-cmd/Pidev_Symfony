<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421231824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP icone');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY produit_ibfk_1');
        $this->addSql('DROP INDEX id_cat ON produit');
        $this->addSql('ALTER TABLE produit CHANGE id_cat id_cat INT NOT NULL, CHANGE nom_pdt nom_pdt VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD icone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE nom_pdt nom_pdt VARCHAR(30) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE id_cat id_cat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT produit_ibfk_1 FOREIGN KEY (id_cat) REFERENCES categorie (id_cat) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX id_cat ON produit (id_cat)');
    }
}

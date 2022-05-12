<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511221544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FAABF2');
        $this->addSql('ALTER TABLE produit CHANGE stars stars INT NOT NULL');
        $this->addSql('DROP INDEX fk_29a5ec27faabf2 ON produit');
        $this->addSql('CREATE INDEX id_cat ON produit (id_cat)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FAABF2 FOREIGN KEY (id_cat) REFERENCES categorie (id_cat)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FAABF2');
        $this->addSql('ALTER TABLE produit CHANGE stars stars INT DEFAULT NULL');
        $this->addSql('DROP INDEX id_cat ON produit');
        $this->addSql('CREATE INDEX FK_29A5EC27FAABF2 ON produit (id_cat)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FAABF2 FOREIGN KEY (id_cat) REFERENCES categorie (id_cat)');
    }
}

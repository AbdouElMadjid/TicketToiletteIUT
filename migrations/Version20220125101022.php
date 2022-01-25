<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125101022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3CE133A9D');
        $this->addSql('DROP INDEX UNIQ_717E22E3CE133A9D ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP ticket_toilette_id');
        $this->addSql('ALTER TABLE ticket_toilette ADD etudiant_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE expirated_at expirated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE ticket_toilette ADD CONSTRAINT FK_EF1DAAC8DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF1DAAC8DDEAB1A3 ON ticket_toilette (etudiant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD ticket_toilette_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3CE133A9D FOREIGN KEY (ticket_toilette_id) REFERENCES ticket_toilette (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_717E22E3CE133A9D ON etudiant (ticket_toilette_id)');
        $this->addSql('ALTER TABLE ticket_toilette DROP FOREIGN KEY FK_EF1DAAC8DDEAB1A3');
        $this->addSql('DROP INDEX UNIQ_EF1DAAC8DDEAB1A3 ON ticket_toilette');
        $this->addSql('ALTER TABLE ticket_toilette DROP etudiant_id, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE expirated_at expirated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}

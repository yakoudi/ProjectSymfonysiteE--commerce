<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122223650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6664D218E');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662A73299E');
        $this->addSql('DROP INDEX IDX_23A0E6664D218E ON article');
        $this->addSql('DROP INDEX IDX_23A0E662A73299E ON article');
        $this->addSql('ALTER TABLE article ADD photo VARCHAR(255) DEFAULT NULL, DROP location_id, DROP lc_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63819EB6921');
        $this->addSql('DROP INDEX IDX_4C62E63819EB6921 ON contact');
        $this->addSql('ALTER TABLE contact DROP client_id, CHANGE suijet subject VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\', ADD adresse VARCHAR(255) NOT NULL, ADD code_postal VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD location_id INT NOT NULL, ADD lc_id INT NOT NULL, DROP photo');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6664D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662A73299E FOREIGN KEY (lc_id) REFERENCES lc (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6664D218E ON article (location_id)');
        $this->addSql('CREATE INDEX IDX_23A0E662A73299E ON article (lc_id)');
        $this->addSql('ALTER TABLE contact ADD client_id INT NOT NULL, CHANGE subject suijet VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_4C62E63819EB6921 ON contact (client_id)');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user DROP roles, DROP adresse, DROP code_postal, CHANGE email email VARCHAR(255) NOT NULL');
    }
}

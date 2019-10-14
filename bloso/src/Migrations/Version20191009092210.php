<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009092210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE camp (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quote VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, date DATE NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, in_preview TINYINT(1) NOT NULL, likes INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, camp_id_id INT NOT NULL, user_name VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_time DATETIME NOT NULL, INDEX IDX_794381C6717AF4CB (camp_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6717AF4CB FOREIGN KEY (camp_id_id) REFERENCES camp (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6717AF4CB');
        $this->addSql('DROP TABLE camp');
        $this->addSql('DROP TABLE review');
    }
}

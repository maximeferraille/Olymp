<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220104933 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tickets_events (tickets_id INT NOT NULL, events_id INT NOT NULL, INDEX IDX_8A19E828FDC0E9A (tickets_id), INDEX IDX_8A19E829D6A1065 (events_id), PRIMARY KEY(tickets_id, events_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets_events ADD CONSTRAINT FK_8A19E828FDC0E9A FOREIGN KEY (tickets_id) REFERENCES tickets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tickets_events ADD CONSTRAINT FK_8A19E829D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF49D6A1065');
        $this->addSql('DROP INDEX UNIQ_54469DF49D6A1065 ON tickets');
        $this->addSql('ALTER TABLE tickets DROP events_id, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT NULL, CHANGE pincode pincode INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tickets_events');
        $this->addSql('ALTER TABLE tickets ADD events_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF49D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_54469DF49D6A1065 ON tickets (events_id)');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE pincode pincode INT DEFAULT NULL');
    }
}

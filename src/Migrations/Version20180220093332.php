<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220093332 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, events_id INT DEFAULT NULL, start_price DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, seat_number INT NOT NULL, INDEX IDX_54469DF4A76ED395 (user_id), UNIQUE INDEX UNIQ_54469DF49D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF49D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT NULL, CHANGE pincode pincode INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tickets');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE pincode pincode INT DEFAULT NULL');
    }
}

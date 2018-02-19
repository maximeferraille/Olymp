<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180216132148 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE events CHANGE seat_count seat_count VARCHAR(255) NOT NULL, CHANGE discipline_description discipline_description VARCHAR(255) NOT NULL, CHANGE pictogram_code pictogram_code VARCHAR(255) NOT NULL, CHANGE discipline_info_url discipline_info_url VARCHAR(255) NOT NULL, CHANGE order_seq order_seq VARCHAR(255) NOT NULL, CHANGE gp_seat_count gp_seat_count VARCHAR(255) NOT NULL, CHANGE gp_org_seat_count gp_org_seat_count VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT NULL, CHANGE pincode pincode INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE events CHANGE seat_count seat_count INT NOT NULL, CHANGE discipline_description discipline_description INT NOT NULL, CHANGE pictogram_code pictogram_code INT NOT NULL, CHANGE discipline_info_url discipline_info_url INT NOT NULL, CHANGE order_seq order_seq INT NOT NULL, CHANGE gp_seat_count gp_seat_count INT NOT NULL, CHANGE gp_org_seat_count gp_org_seat_count INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE pincode pincode INT DEFAULT NULL');
    }
}

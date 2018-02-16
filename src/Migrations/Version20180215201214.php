<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180215201214 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, session_code VARCHAR(255) NOT NULL, session_date DATETIME NOT NULL, start_date_time DATETIME NOT NULL, start_date DATETIME NOT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, time_code VARCHAR(255) NOT NULL, medal VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, description_name VARCHAR(255) NOT NULL, description_name_detail VARCHAR(255) NOT NULL, discipline_code VARCHAR(255) NOT NULL, discipline_name VARCHAR(255) NOT NULL, discipline_sort VARCHAR(255) NOT NULL, stadium_code VARCHAR(255) NOT NULL, stadium_name VARCHAR(255) NOT NULL, cluster_code INT NOT NULL, cluster_name INT NOT NULL, venue_name INT NOT NULL, session_price INT NOT NULL, session_price_a INT NOT NULL, seat_count INT NOT NULL, org_seat_count INT NOT NULL, discipline_description INT NOT NULL, pictogram_code INT NOT NULL, discipline_info_url INT NOT NULL, pinid INT NOT NULL, venue_code INT NOT NULL, venue_codes INT NOT NULL, order_seq INT NOT NULL, gp_seat_count INT NOT NULL, gp_org_seat_count INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT NULL, CHANGE pincode pincode INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE events');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE pincode pincode INT DEFAULT NULL');
    }
}

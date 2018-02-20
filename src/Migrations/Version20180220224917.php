<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220224917 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, token_auth VARCHAR(255) DEFAULT NULL, pincode INT DEFAULT NULL, ip_adress VARCHAR(255) NOT NULL, ins_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events CHANGE session_date session_date VARCHAR(255) NOT NULL, CHANGE start_date_time start_date_time VARCHAR(255) NOT NULL, CHANGE start_date start_date VARCHAR(255) NOT NULL, CHANGE start_time start_time VARCHAR(255) NOT NULL, CHANGE end_time end_time VARCHAR(255) NOT NULL, CHANGE cluster_code cluster_code VARCHAR(255) NOT NULL, CHANGE cluster_name cluster_name VARCHAR(255) NOT NULL, CHANGE venue_name venue_name VARCHAR(255) NOT NULL, CHANGE session_price session_price VARCHAR(255) NOT NULL, CHANGE session_price_a session_price_a VARCHAR(255) NOT NULL, CHANGE org_seat_count org_seat_count VARCHAR(255) NOT NULL, CHANGE pinid pinid VARCHAR(255) NOT NULL, CHANGE venue_code venue_code VARCHAR(255) NOT NULL, CHANGE venue_codes venue_codes VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE events CHANGE session_date session_date DATETIME NOT NULL, CHANGE start_date_time start_date_time DATETIME NOT NULL, CHANGE start_date start_date DATETIME NOT NULL, CHANGE start_time start_time DATETIME NOT NULL, CHANGE end_time end_time DATETIME NOT NULL, CHANGE cluster_code cluster_code INT NOT NULL, CHANGE cluster_name cluster_name INT NOT NULL, CHANGE venue_name venue_name INT NOT NULL, CHANGE session_price session_price INT NOT NULL, CHANGE session_price_a session_price_a INT NOT NULL, CHANGE org_seat_count org_seat_count INT NOT NULL, CHANGE pinid pinid INT NOT NULL, CHANGE venue_code venue_code INT NOT NULL, CHANGE venue_codes venue_codes INT NOT NULL');
    }
}

<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180211190453 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sports CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT NULL, CHANGE pincode pincode INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sports CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE user CHANGE token_auth token_auth VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE pincode pincode INT DEFAULT NULL');
    }
}

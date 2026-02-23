<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260223180442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE login (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE payment_method (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, transaction_id INT NOT NULL, no_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_723705D12FC0CB0F (transaction_id), INDEX IDX_723705D11A65C546 (no_id), INDEX IDX_723705D1A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(255) NOT NULL, payment_method INT NOT NULL, category INT NOT NULL, transcation VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D12FC0CB0F FOREIGN KEY (transaction_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D11A65C546 FOREIGN KEY (no_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D12FC0CB0F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D11A65C546');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE login');
        $this->addSql('DROP TABLE payment_method');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
    }
}

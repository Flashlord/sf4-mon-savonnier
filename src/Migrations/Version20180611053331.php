<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180611053331 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stock_movement_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE products (id INT NOT NULL, stock_movements_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A8E8A2F0D ON products (stock_movements_id)');
        $this->addSql('CREATE TABLE stock_movement_types (id INT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A8E8A2F0D FOREIGN KEY (stock_movements_id) REFERENCES stock_movements (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stock_movements ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_movements ADD CONSTRAINT FK_A0BE93C9C54C8C93 FOREIGN KEY (type_id) REFERENCES stock_movement_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A0BE93C9C54C8C93 ON stock_movements (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE stock_movements DROP CONSTRAINT FK_A0BE93C9C54C8C93');
        $this->addSql('DROP SEQUENCE products_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stock_movement_types_id_seq CASCADE');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE stock_movement_types');
        $this->addSql('DROP INDEX IDX_A0BE93C9C54C8C93');
        $this->addSql('ALTER TABLE stock_movements DROP type_id');
    }
}

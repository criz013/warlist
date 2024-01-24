<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124131749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE army_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data_sheet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE games_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE key_word_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE army (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE army_games (army_id INT NOT NULL, games_id INT NOT NULL, PRIMARY KEY(army_id, games_id))');
        $this->addSql('CREATE INDEX IDX_F53DAAF718D2742D ON army_games (army_id)');
        $this->addSql('CREATE INDEX IDX_F53DAAF797FFC673 ON army_games (games_id)');
        $this->addSql('CREATE TABLE data_sheet (id INT NOT NULL, army_id INT NOT NULL, key_word_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C9835D7D18D2742D ON data_sheet (army_id)');
        $this->addSql('CREATE INDEX IDX_C9835D7D818167B3 ON data_sheet (key_word_id)');
        $this->addSql('CREATE TABLE games (id INT NOT NULL, name VARCHAR(255) NOT NULL, version VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE key_word (id INT NOT NULL, game_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_45F6AED8E48FD905 ON key_word (game_id)');
        $this->addSql('ALTER TABLE army_games ADD CONSTRAINT FK_F53DAAF718D2742D FOREIGN KEY (army_id) REFERENCES army (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE army_games ADD CONSTRAINT FK_F53DAAF797FFC673 FOREIGN KEY (games_id) REFERENCES games (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data_sheet ADD CONSTRAINT FK_C9835D7D18D2742D FOREIGN KEY (army_id) REFERENCES army (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data_sheet ADD CONSTRAINT FK_C9835D7D818167B3 FOREIGN KEY (key_word_id) REFERENCES key_word (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE key_word ADD CONSTRAINT FK_45F6AED8E48FD905 FOREIGN KEY (game_id) REFERENCES games (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE army_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data_sheet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE games_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE key_word_id_seq CASCADE');
        $this->addSql('ALTER TABLE army_games DROP CONSTRAINT FK_F53DAAF718D2742D');
        $this->addSql('ALTER TABLE army_games DROP CONSTRAINT FK_F53DAAF797FFC673');
        $this->addSql('ALTER TABLE data_sheet DROP CONSTRAINT FK_C9835D7D18D2742D');
        $this->addSql('ALTER TABLE data_sheet DROP CONSTRAINT FK_C9835D7D818167B3');
        $this->addSql('ALTER TABLE key_word DROP CONSTRAINT FK_45F6AED8E48FD905');
        $this->addSql('DROP TABLE army');
        $this->addSql('DROP TABLE army_games');
        $this->addSql('DROP TABLE data_sheet');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE key_word');
    }
}

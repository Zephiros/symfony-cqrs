<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927223704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "UserSetting_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "UserSetting" (id INT NOT NULL, theme INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "User" ADD "UserSettingId" INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "User" ADD CONSTRAINT FK_2DA1797735E15A86 FOREIGN KEY ("UserSettingId") REFERENCES "UserSetting" ("id") NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA1797735E15A86 ON "User" ("UserSettingId")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "User" DROP CONSTRAINT FK_2DA1797735E15A86');
        $this->addSql('DROP SEQUENCE "UserSetting_id_seq" CASCADE');
        $this->addSql('DROP TABLE "UserSetting"');
        $this->addSql('DROP INDEX UNIQ_2DA1797735E15A86');
        $this->addSql('ALTER TABLE "User" DROP "UserSettingId"');
    }
}

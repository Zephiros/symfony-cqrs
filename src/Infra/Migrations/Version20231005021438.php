<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231005021438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "categories_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "countries_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "products_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_settings_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "users_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "categories" (id INT NOT NULL, name VARCHAR(255) NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "countries" (id INT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "products" (id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, isActive BOOLEAN NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "products_categories" (product_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(product_id, category_id))');
        $this->addSql('CREATE INDEX IDX_E8ACBE764584665A ON "products_categories" (product_id)');
        $this->addSql('CREATE INDEX IDX_E8ACBE7612469DE2 ON "products_categories" (category_id)');
        $this->addSql('CREATE TABLE "user_settings" (id INT NOT NULL, theme INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, "UserSettingId" INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E935E15A86 ON "users" ("UserSettingId")');
        $this->addSql('ALTER TABLE "products_categories" ADD CONSTRAINT FK_E8ACBE764584665A FOREIGN KEY (product_id) REFERENCES "products" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "products_categories" ADD CONSTRAINT FK_E8ACBE7612469DE2 FOREIGN KEY (category_id) REFERENCES "categories" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "users" ADD CONSTRAINT FK_1483A5E935E15A86 FOREIGN KEY ("UserSettingId") REFERENCES "user_settings" ("id") NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "categories_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "countries_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "products_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "user_settings_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "users_id_seq" CASCADE');
        $this->addSql('ALTER TABLE "products_categories" DROP CONSTRAINT FK_E8ACBE764584665A');
        $this->addSql('ALTER TABLE "products_categories" DROP CONSTRAINT FK_E8ACBE7612469DE2');
        $this->addSql('ALTER TABLE "users" DROP CONSTRAINT FK_1483A5E935E15A86');
        $this->addSql('DROP TABLE "categories"');
        $this->addSql('DROP TABLE "countries"');
        $this->addSql('DROP TABLE "products"');
        $this->addSql('DROP TABLE "products_categories"');
        $this->addSql('DROP TABLE "user_settings"');
        $this->addSql('DROP TABLE "users"');
    }
}

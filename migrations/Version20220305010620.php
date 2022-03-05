<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220305010620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, cusname_id INT DEFAULT NULL, staname_id INT DEFAULT NULL, INDEX IDX_7A2119E3ADCA8444 (cusname_id), INDEX IDX_7A2119E3A38127B9 (staname_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill_product (bill_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_278930B21A8C12F5 (bill_id), INDEX IDX_278930B24584665A (product_id), PRIMARY KEY(bill_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, img LONGTEXT NOT NULL, dob DATE NOT NULL, address VARCHAR(255) NOT NULL, phonenumber VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, img LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dob DATE NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3ADCA8444 FOREIGN KEY (cusname_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3A38127B9 FOREIGN KEY (staname_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE bill_product ADD CONSTRAINT FK_278930B21A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bill_product ADD CONSTRAINT FK_278930B24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bill_product DROP FOREIGN KEY FK_278930B21A8C12F5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3ADCA8444');
        $this->addSql('ALTER TABLE bill_product DROP FOREIGN KEY FK_278930B24584665A');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3A38127B9');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE bill_product');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE staff');
    }
}

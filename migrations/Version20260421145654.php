<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421145654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL, number VARCHAR(20) NOT NULL, postal_code VARCHAR(20) NOT NULL, city VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, phone VARCHAR(30) DEFAULT NULL, is_default TINYINT DEFAULT 0 NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_BA388B7A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE cart_item (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, cart_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_F0FE25271AD5CDBF (cart_id), INDEX IDX_F0FE25274584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_64C19C1989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, status VARCHAR(50) NOT NULL, rating SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C4584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE nutritional_icon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, icon_path VARCHAR(255) NOT NULL, color VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, total_price NUMERIC(10, 2) NOT NULL, status VARCHAR(50) NOT NULL, payment_method VARCHAR(50) NOT NULL, payment_status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), INDEX IDX_F5299398F5B7AF75 (address_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, price_at_purchase NUMERIC(10, 2) NOT NULL, theorder_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_52EA1F091905A2A3 (theorder_id), INDEX IDX_52EA1F094584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, slug VARCHAR(100) NOT NULL, description_short LONGTEXT NOT NULL, description_long LONGTEXT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, discount_percent INT DEFAULT NULL, stock INT NOT NULL, is_popular TINYINT DEFAULT 0 NOT NULL, is_featured TINYINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, keywords JSON DEFAULT NULL, origin LONGTEXT DEFAULT NULL, taste LONGTEXT DEFAULT NULL, usage_advice LONGTEXT DEFAULT NULL, conservation LONGTEXT DEFAULT NULL, category_id INT NOT NULL, UNIQUE INDEX UNIQ_D34A04AD989D9B62 (slug), INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE product_image (id INT AUTO_INCREMENT NOT NULL, image_path VARCHAR(255) NOT NULL, type_image VARCHAR(50) NOT NULL, product_id INT NOT NULL, INDEX IDX_64617F034584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE product_nutritional_icon (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, nutritional_icon_id INT NOT NULL, INDEX IDX_5B6947304584665A (product_id), INDEX IDX_5B694730903DCB57 (nutritional_icon_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, profile_image VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, google_id VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE wishlist (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_9CE12A31A76ED395 (user_id), INDEX IDX_9CE12A314584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart_item ADD CONSTRAINT FK_F0FE25271AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE cart_item ADD CONSTRAINT FK_F0FE25274584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F091905A2A3 FOREIGN KEY (theorder_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_nutritional_icon ADD CONSTRAINT FK_5B6947304584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_nutritional_icon ADD CONSTRAINT FK_5B694730903DCB57 FOREIGN KEY (nutritional_icon_id) REFERENCES nutritional_icon (id)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A31A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A314584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7A76ED395');
        $this->addSql('ALTER TABLE cart_item DROP FOREIGN KEY FK_F0FE25271AD5CDBF');
        $this->addSql('ALTER TABLE cart_item DROP FOREIGN KEY FK_F0FE25274584665A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4584665A');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F5B7AF75');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F091905A2A3');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
        $this->addSql('ALTER TABLE product_nutritional_icon DROP FOREIGN KEY FK_5B6947304584665A');
        $this->addSql('ALTER TABLE product_nutritional_icon DROP FOREIGN KEY FK_5B694730903DCB57');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A31A76ED395');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A314584665A');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_item');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE nutritional_icon');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_image');
        $this->addSql('DROP TABLE product_nutritional_icon');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wishlist');
    }
}

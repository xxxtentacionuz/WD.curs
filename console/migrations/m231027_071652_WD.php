<?php

use yii\db\Migration;

/**
 * Class m231027_071652_WD
 */
class m231027_071652_WD extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "CREATE TABLE `orders`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL
);
CREATE TABLE `user`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `auth_key` VARCHAR(255) NOT NULL,
    `password_hash` VARCHAR(255) NOT NULL,
    `password_reset_token` VARCHAR(255) NULL,
    `email` VARCHAR(255) NOT NULL,
    `status` SMALLINT NOT NULL DEFAULT '10',
    `created_at` INT NOT NULL,
    `updated_at` INT NOT NULL,
    `verification_token` BIGINT NULL
);
ALTER TABLE
    `user` ADD INDEX `user_username_index`(`username`);
ALTER TABLE
    `user` ADD INDEX `user_password_reset_token_index`(`password_reset_token`);
ALTER TABLE
    `user` ADD INDEX `user_email_index`(`email`);
CREATE TABLE `product_image`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NOT NULL,
    `link` VARCHAR(255) NOT NULL
);
CREATE TABLE `order_details`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `order_id` BIGINT NOT NULL,
    `product_id` BIGINT NOT NULL,
    `count` BIGINT NOT NULL
);
CREATE TABLE `news_category`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `news`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `category_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `body` TEXT NOT NULL,
    `views` INT NOT NULL
);
CREATE TABLE `cart`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NOT NULL,
    `user_ud` INT NOT NULL,
    `count` INT NOT NULL
);
CREATE TABLE `category`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `product`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category_id` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` BIGINT NOT NULL,
    `description` TEXT NOT NULL
);
ALTER TABLE
    `news` ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY(`category_id`) REFERENCES `news_category`(`id`);
ALTER TABLE
    `cart` ADD CONSTRAINT `cart_user_ud_foreign` FOREIGN KEY(`user_ud`) REFERENCES `user`(`id`);
ALTER TABLE
    `cart` ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);
ALTER TABLE
    `order_details` ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);
ALTER TABLE
    `order_details` ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY(`order_id`) REFERENCES `orders`(`id`);
ALTER TABLE
    `orders` ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `news` ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY(`category_id`) REFERENCES `category`(`id`);
ALTER TABLE
    `product_image` ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY(`product_id`) REFERENCES `product`(`id`);";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231027_071652_WD cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231027_071652_WD cannot be reverted.\n";

        return false;
    }
    */
}

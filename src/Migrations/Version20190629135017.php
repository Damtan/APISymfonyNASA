<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190629135017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nasa_camera (id INT AUTO_INCREMENT NOT NULL, eid INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_camera_name (id INT AUTO_INCREMENT NOT NULL, cl_id INT NOT NULL, name VARCHAR(255) NOT NULL, full_name LONGTEXT NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_camera_to_rover (id INT AUTO_INCREMENT NOT NULL, camera_id INT NOT NULL, rover_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_data (id INT AUTO_INCREMENT NOT NULL, image_url VARCHAR(255) NOT NULL, image_earth_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_rover (id INT AUTO_INCREMENT NOT NULL, eid INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_rover_name (id INT AUTO_INCREMENT NOT NULL, cl_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_space_mission (id INT AUTO_INCREMENT NOT NULL, eid INT NOT NULL, img_src VARCHAR(255) NOT NULL, earth_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasa_space_mission_to_camera (id INT AUTO_INCREMENT NOT NULL, nasa_id INT NOT NULL, camera_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE nasa_camera');
        $this->addSql('DROP TABLE nasa_camera_name');
        $this->addSql('DROP TABLE nasa_camera_to_rover');
        $this->addSql('DROP TABLE nasa_data');
        $this->addSql('DROP TABLE nasa_rover');
        $this->addSql('DROP TABLE nasa_rover_name');
        $this->addSql('DROP TABLE nasa_space_mission');
        $this->addSql('DROP TABLE nasa_space_mission_to_camera');
    }
}

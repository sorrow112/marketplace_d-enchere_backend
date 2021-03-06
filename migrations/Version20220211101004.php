<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211101004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, INDEX IDX_C35F0816A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, fabrication_date DATETIME NOT NULL, brand VARCHAR(255) DEFAULT NULL, codebar VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE augmentation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, enchere_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, INDEX IDX_4517155DA76ED395 (user_id), INDEX IDX_4517155DE80B6EFB (enchere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, panier_id INT NOT NULL, user_id INT NOT NULL, transaction_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_6EEAA67DF77D927C (panier_id), INDEX IDX_6EEAA67DA76ED395 (user_id), UNIQUE INDEX UNIQ_6EEAA67D2FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_devis (id INT AUTO_INCREMENT NOT NULL, transmitter_id INT NOT NULL, transmitted_to_id INT NOT NULL, description_article VARCHAR(255) NOT NULL, quantity INT NOT NULL, INDEX IDX_7DF94602B703C510 (transmitter_id), INDEX IDX_7DF946021E9C6980 (transmitted_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_D8698A767294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, fermeture_id INT DEFAULT NULL, article_id INT NOT NULL, user_id INT NOT NULL, quantity INT NOT NULL, init_price DOUBLE PRECISION NOT NULL, immediate_price DOUBLE PRECISION NOT NULL, current_price DOUBLE PRECISION NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_38D1870FF806882 (fermeture_id), UNIQUE INDEX UNIQ_38D1870F7294869C (article_id), INDEX IDX_38D1870FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_category (enchere_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4B569282E80B6EFB (enchere_id), INDEX IDX_4B56928212469DE2 (category_id), PRIMARY KEY(enchere_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_inverse (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, fermeture_id INT DEFAULT NULL, user_id INT NOT NULL, quantity INT NOT NULL, init_price DOUBLE PRECISION NOT NULL, immediate_price DOUBLE PRECISION NOT NULL, current_price DOUBLE PRECISION NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_D83B2807294869C (article_id), UNIQUE INDEX UNIQ_D83B280F806882 (fermeture_id), INDEX IDX_D83B280A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_inverse_category (enchere_inverse_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_DF6A6E852536C01D (enchere_inverse_id), INDEX IDX_DF6A6E8512469DE2 (category_id), PRIMARY KEY(enchere_inverse_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fermeture (id INT AUTO_INCREMENT NOT NULL, augmentation_id INT DEFAULT NULL, date DATETIME NOT NULL, is_sold TINYINT(1) NOT NULL, final_price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_59827437B6431B45 (augmentation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_24CC0DF2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier_vente (panier_id INT NOT NULL, vente_id INT NOT NULL, INDEX IDX_A1A705F1F77D927C (panier_id), INDEX IDX_A1A705F17DC7170A (vente_id), PRIMARY KEY(panier_id, vente_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposition (id INT AUTO_INCREMENT NOT NULL, transmitter_id INT NOT NULL, transmitted_to_id INT NOT NULL, enchere_id INT DEFAULT NULL, INDEX IDX_C7CDC353B703C510 (transmitter_id), INDEX IDX_C7CDC3531E9C6980 (transmitted_to_id), INDEX IDX_C7CDC353E80B6EFB (enchere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reduction (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, enchere_inverse_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, INDEX IDX_B1E75468A76ED395 (user_id), INDEX IDX_B1E754682536C01D (enchere_inverse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE surveille (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, enchere_id INT DEFAULT NULL, enchere_inverse_id INT DEFAULT NULL, INDEX IDX_CFBA9818A76ED395 (user_id), INDEX IDX_CFBA9818E80B6EFB (enchere_id), INDEX IDX_CFBA98182536C01D (enchere_inverse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, transmitter_id INT DEFAULT NULL, transmitted_to_id INT DEFAULT NULL, transaction_id VARCHAR(255) NOT NULL, date DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, INDEX IDX_723705D1B703C510 (transmitter_id), INDEX IDX_723705D11E9C6980 (transmitted_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user_name VARCHAR(20) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, user_id INT NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_888A2A4C7294869C (article_id), INDEX IDX_888A2A4CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente_category (vente_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_A619F1257DC7170A (vente_id), INDEX IDX_A619F12512469DE2 (category_id), PRIMARY KEY(vente_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE augmentation ADD CONSTRAINT FK_4517155DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE augmentation ADD CONSTRAINT FK_4517155DE80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE demande_devis ADD CONSTRAINT FK_7DF94602B703C510 FOREIGN KEY (transmitter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE demande_devis ADD CONSTRAINT FK_7DF946021E9C6980 FOREIGN KEY (transmitted_to_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A767294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870FF806882 FOREIGN KEY (fermeture_id) REFERENCES fermeture (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE enchere_category ADD CONSTRAINT FK_4B569282E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_category ADD CONSTRAINT FK_4B56928212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_inverse ADD CONSTRAINT FK_D83B2807294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE enchere_inverse ADD CONSTRAINT FK_D83B280F806882 FOREIGN KEY (fermeture_id) REFERENCES fermeture (id)');
        $this->addSql('ALTER TABLE enchere_inverse ADD CONSTRAINT FK_D83B280A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE enchere_inverse_category ADD CONSTRAINT FK_DF6A6E852536C01D FOREIGN KEY (enchere_inverse_id) REFERENCES enchere_inverse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_inverse_category ADD CONSTRAINT FK_DF6A6E8512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fermeture ADD CONSTRAINT FK_59827437B6431B45 FOREIGN KEY (augmentation_id) REFERENCES augmentation (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier_vente ADD CONSTRAINT FK_A1A705F1F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_vente ADD CONSTRAINT FK_A1A705F17DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposition ADD CONSTRAINT FK_C7CDC353B703C510 FOREIGN KEY (transmitter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proposition ADD CONSTRAINT FK_C7CDC3531E9C6980 FOREIGN KEY (transmitted_to_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proposition ADD CONSTRAINT FK_C7CDC353E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE reduction ADD CONSTRAINT FK_B1E75468A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reduction ADD CONSTRAINT FK_B1E754682536C01D FOREIGN KEY (enchere_inverse_id) REFERENCES enchere_inverse (id)');
        $this->addSql('ALTER TABLE surveille ADD CONSTRAINT FK_CFBA9818A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE surveille ADD CONSTRAINT FK_CFBA9818E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE surveille ADD CONSTRAINT FK_CFBA98182536C01D FOREIGN KEY (enchere_inverse_id) REFERENCES enchere_inverse (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1B703C510 FOREIGN KEY (transmitter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D11E9C6980 FOREIGN KEY (transmitted_to_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente_category ADD CONSTRAINT FK_A619F1257DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vente_category ADD CONSTRAINT FK_A619F12512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A767294869C');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F7294869C');
        $this->addSql('ALTER TABLE enchere_inverse DROP FOREIGN KEY FK_D83B2807294869C');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C7294869C');
        $this->addSql('ALTER TABLE fermeture DROP FOREIGN KEY FK_59827437B6431B45');
        $this->addSql('ALTER TABLE enchere_category DROP FOREIGN KEY FK_4B56928212469DE2');
        $this->addSql('ALTER TABLE enchere_inverse_category DROP FOREIGN KEY FK_DF6A6E8512469DE2');
        $this->addSql('ALTER TABLE vente_category DROP FOREIGN KEY FK_A619F12512469DE2');
        $this->addSql('ALTER TABLE augmentation DROP FOREIGN KEY FK_4517155DE80B6EFB');
        $this->addSql('ALTER TABLE enchere_category DROP FOREIGN KEY FK_4B569282E80B6EFB');
        $this->addSql('ALTER TABLE proposition DROP FOREIGN KEY FK_C7CDC353E80B6EFB');
        $this->addSql('ALTER TABLE surveille DROP FOREIGN KEY FK_CFBA9818E80B6EFB');
        $this->addSql('ALTER TABLE enchere_inverse_category DROP FOREIGN KEY FK_DF6A6E852536C01D');
        $this->addSql('ALTER TABLE reduction DROP FOREIGN KEY FK_B1E754682536C01D');
        $this->addSql('ALTER TABLE surveille DROP FOREIGN KEY FK_CFBA98182536C01D');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870FF806882');
        $this->addSql('ALTER TABLE enchere_inverse DROP FOREIGN KEY FK_D83B280F806882');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF77D927C');
        $this->addSql('ALTER TABLE panier_vente DROP FOREIGN KEY FK_A1A705F1F77D927C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D2FC0CB0F');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A76ED395');
        $this->addSql('ALTER TABLE augmentation DROP FOREIGN KEY FK_4517155DA76ED395');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE demande_devis DROP FOREIGN KEY FK_7DF94602B703C510');
        $this->addSql('ALTER TABLE demande_devis DROP FOREIGN KEY FK_7DF946021E9C6980');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870FA76ED395');
        $this->addSql('ALTER TABLE enchere_inverse DROP FOREIGN KEY FK_D83B280A76ED395');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2A76ED395');
        $this->addSql('ALTER TABLE proposition DROP FOREIGN KEY FK_C7CDC353B703C510');
        $this->addSql('ALTER TABLE proposition DROP FOREIGN KEY FK_C7CDC3531E9C6980');
        $this->addSql('ALTER TABLE reduction DROP FOREIGN KEY FK_B1E75468A76ED395');
        $this->addSql('ALTER TABLE surveille DROP FOREIGN KEY FK_CFBA9818A76ED395');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1B703C510');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D11E9C6980');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CA76ED395');
        $this->addSql('ALTER TABLE panier_vente DROP FOREIGN KEY FK_A1A705F17DC7170A');
        $this->addSql('ALTER TABLE vente_category DROP FOREIGN KEY FK_A619F1257DC7170A');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE augmentation');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE demande_devis');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE enchere_category');
        $this->addSql('DROP TABLE enchere_inverse');
        $this->addSql('DROP TABLE enchere_inverse_category');
        $this->addSql('DROP TABLE fermeture');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_vente');
        $this->addSql('DROP TABLE proposition');
        $this->addSql('DROP TABLE reduction');
        $this->addSql('DROP TABLE surveille');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vente');
        $this->addSql('DROP TABLE vente_category');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

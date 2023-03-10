<?php

declare(strict_types=1);

namespace OxidEsales\EshopCommunity\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130212101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $sql = "ALTER TABLE `oxarticles`
                  ADD IF NOT EXISTS OXFIRSTPAYMENT DECIMAL(16, 8)
                    AFTER OXPRICE,
                  ADD IF NOT EXISTS OXPAYMENTMONTHS INT
                    AFTER OXFIRSTPAYMENT";
        $this->addSql($sql);
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}

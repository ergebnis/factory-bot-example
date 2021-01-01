<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace Ergebnis\Example\Migration;

use Doctrine\DBAL;
use Doctrine\Migrations;

final class Version20200809104355 extends Migrations\AbstractMigration
{
    public function up(DBAL\Schema\Schema $schema): void
    {
        $this->addSql('CREATE TABLE code_of_conduct (key VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, body TEXT NOT NULL, PRIMARY KEY(key))');
        $this->addSql('CREATE TABLE organization (id VARCHAR(36) NOT NULL, is_verified BOOLEAN NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE organization_user (organization_id VARCHAR(36) NOT NULL, user_id VARCHAR(36) NOT NULL, PRIMARY KEY(organization_id, user_id))');
        $this->addSql('CREATE INDEX IDX_B49AE8D432C8A3DE ON organization_user (organization_id)');
        $this->addSql('CREATE INDEX IDX_B49AE8D4A76ED395 ON organization_user (user_id)');
        $this->addSql('CREATE TABLE project (id VARCHAR(36) NOT NULL, repository_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE50C9D4F7 ON project (repository_id)');
        $this->addSql('CREATE TABLE repository (id VARCHAR(255) NOT NULL, organization_id VARCHAR(36) NOT NULL, template_id VARCHAR(255) DEFAULT NULL, code_of_conduct_key VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CFE57CD32C8A3DE ON repository (organization_id)');
        $this->addSql('CREATE INDEX IDX_5CFE57CD5DA0FB8 ON repository (template_id)');
        $this->addSql('CREATE INDEX IDX_5CFE57CD5335B797 ON repository (code_of_conduct_key)');
        $this->addSql('CREATE TABLE "user" (id VARCHAR(36) NOT NULL, login VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, avatarurl VARCHAR(255) NOT NULL, avatarwidth INT NOT NULL, avatarheight INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE organization_user ADD CONSTRAINT FK_B49AE8D432C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE organization_user ADD CONSTRAINT FK_B49AE8D4A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE50C9D4F7 FOREIGN KEY (repository_id) REFERENCES repository (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE repository ADD CONSTRAINT FK_5CFE57CD32C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE repository ADD CONSTRAINT FK_5CFE57CD5DA0FB8 FOREIGN KEY (template_id) REFERENCES repository (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE repository ADD CONSTRAINT FK_5CFE57CD5335B797 FOREIGN KEY (code_of_conduct_key) REFERENCES code_of_conduct (key) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(DBAL\Schema\Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE repository DROP CONSTRAINT FK_5CFE57CD5335B797');
        $this->addSql('ALTER TABLE organization_user DROP CONSTRAINT FK_B49AE8D432C8A3DE');
        $this->addSql('ALTER TABLE repository DROP CONSTRAINT FK_5CFE57CD32C8A3DE');
        $this->addSql('ALTER TABLE project DROP CONSTRAINT FK_2FB3D0EE50C9D4F7');
        $this->addSql('ALTER TABLE repository DROP CONSTRAINT FK_5CFE57CD5DA0FB8');
        $this->addSql('ALTER TABLE organization_user DROP CONSTRAINT FK_B49AE8D4A76ED395');
        $this->addSql('DROP TABLE code_of_conduct');
        $this->addSql('DROP TABLE organization');
        $this->addSql('DROP TABLE organization_user');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE repository');
        $this->addSql('DROP TABLE "user"');
    }
}

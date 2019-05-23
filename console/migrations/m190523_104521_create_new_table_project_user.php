<?php

use yii\db\Migration;

/**
 * Class m190523_104521_create_new_table_project_user
 */
class m190523_104521_create_new_table_project_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_user', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => "enum('manager', 'developer', 'tester')"
        ]);

        // add foreign key for field `user_id`
        $this->addForeignKey(
            'fx-project_user-user_id=user-id',
            'project_user',
            'user_id',
            'user',
            'id'
        );
        // add foreign key for field `project_id`
        $this->addForeignKey(
            'fx-project_user-project_id=project-id',
            'project_user',
            'project_id',
            'project',
            'id'
        );

    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project_user');

        $this->dropForeignKey('fx-project_user-user_id=user-id', 'project_user');
        $this->dropForeignKey('fx-project_user-project_id=project-id', 'project_user');

        return true;
    }
}

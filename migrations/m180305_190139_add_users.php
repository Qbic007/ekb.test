<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m180305_190139_add_users
 */
class m180305_190139_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $new_user = new User();
        $new_user->username = 'admin';
        $new_user->password = 'admin';
        $new_user->save();

        $new_user = new User();
        $new_user->username = 'demo';
        $new_user->password = 'demo';
        $new_user->save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180305_190139_add_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180305_190139_add_users cannot be reverted.\n";

        return false;
    }
    */
}

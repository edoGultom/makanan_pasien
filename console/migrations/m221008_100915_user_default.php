<?php

use yii\db\Migration;

/**
 * Class m221008_100915_user_default
 */
class m221008_100915_user_default extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'user',
            [
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at',
            ],
            [
                ['admin', 'g3DLJxWabCdhoSaSvxngMZQRaKCyGp-R', '$2y$10$ezLA5fcIaFDEbWi5axvKQekLW019TmVL1dgpoLPTtEGCNzX7bHPO6', null, 'admin@g.co.id', '10', time(), time()],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_100915_user_default cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_100915_user_default cannot be reverted.\n";

        return false;
    }
    */
}
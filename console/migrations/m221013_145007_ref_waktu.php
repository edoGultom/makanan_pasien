<?php

use yii\db\Migration;

/**
 * Class m221013_145007_ref_waktu
 */
class m221013_145007_ref_waktu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ref_waktu', [
            'id' => $this->primaryKey(),
            'nama' => $this->text(),
        ]);

        $this->batchInsert(
            'ref_waktu',
            [
                'nama',
            ],
            [
                ['Pagi'],
                ['Siang'],
                ['Malam'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221013_145007_ref_waktu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221013_145007_ref_waktu cannot be reverted.\n";

        return false;
    }
    */
}
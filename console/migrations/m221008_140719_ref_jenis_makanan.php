<?php

use yii\db\Migration;

/**
 * Class m221008_140719_ref_jenis_makanan
 */
class m221008_140719_ref_jenis_makanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ref_jenis_makanan', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(10),
            'nama' => $this->text(),
        ]);

        $this->batchInsert(
            'ref_jenis_makanan',
            [
                'nama',
                'kode',
            ],
            [
                ['Makanan Pokok (MP)', 'MP'],
                ['Lauk Hewani (LH)', 'LH'],
                ['Lauk Nabati (LN)', 'LN'],
                ['Sayuran (S)', 'S'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_140719_ref_jenis_makanan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_140719_ref_jenis_makanan cannot be reverted.\n";

        return false;
    }
    */
}
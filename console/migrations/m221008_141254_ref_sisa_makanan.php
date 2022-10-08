<?php

use yii\db\Migration;

/**
 * Class m221008_141254_ref_sisa_makanan
 */
class m221008_141254_ref_sisa_makanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ref_sisa_makanan', [
            'id' => $this->primaryKey(),
            'keterangan' => $this->text(),
        ]);

        $this->batchInsert(
            'ref_sisa_makanan',
            [
                'keterangan',
            ],
            [
                ['Tidak Dimakan'],
                ['Sisa 3/4 (75%)'],
                ['Sisa 1/2 (50%)'],
                ['Sisa 1/4 (25%)'],
                ['Tidak Bersisa'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_141254_ref_sisa_makanan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_141254_ref_sisa_makanan cannot be reverted.\n";

        return false;
    }
    */
}
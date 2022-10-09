<?php

use yii\db\Migration;

/**
 * Class m221009_031538_ta_skor_makanan
 */
class m221009_031538_ta_skor_makanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ta_skor_makanan', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->tinyInteger(),
            'jumlah' => $this->integer(),
            'persentasi_skor' => $this->float(),
            'keterangan_skor' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221009_031538_ta_skor_makanan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221009_031538_ta_skor_makanan cannot be reverted.\n";

        return false;
    }
    */
}
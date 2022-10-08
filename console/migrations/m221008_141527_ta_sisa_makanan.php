<?php

use yii\db\Migration;

/**
 * Class m221008_141527_ta_sisa_makanan
 */
class m221008_141527_ta_sisa_makanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ta_sisa_makanan', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->tinyInteger(),
            'id_jenis_makanan' => $this->tinyInteger(),
            'id_sisa_makanan' => $this->tinyInteger(),
            'nilai' => $this->integer(),
            'jumlah' => $this->integer(),
            'dikalikan' => $this->tinyInteger(),
            'persentasi_skor' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_141527_ta_sisa_makanan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_141527_ta_sisa_makanan cannot be reverted.\n";

        return false;
    }
    */
}
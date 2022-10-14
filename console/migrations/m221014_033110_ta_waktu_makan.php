<?php

use yii\db\Migration;

/**
 * Class m221014_033110_ta_waktu_makan
 */
class m221014_033110_ta_waktu_makan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ta_waktu_makan', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->tinyInteger(),
            'id_waktu' => $this->tinyInteger(),
            'jenis_diet' => $this->string(255),
            'tanggal' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221014_033110_ta_waktu_makan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221014_033110_ta_waktu_makan cannot be reverted.\n";

        return false;
    }
    */
}
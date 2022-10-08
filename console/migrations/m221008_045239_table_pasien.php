<?php

use yii\db\Migration;

/**
 * Class m221008_045239_table_pasien
 */
class m221008_045239_table_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ta_pasien}}', [
            'id_pasien' => $this->primaryKey(),
            'nama' => $this->text(),
            'skor_sisa_makanan' => $this->tinyInteger(),
            'keterangan' => $this->string(255),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_045239_table_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_045239_table_pasien cannot be reverted.\n";

        return false;
    }
    */
}
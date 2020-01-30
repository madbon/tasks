<?php

use yii\db\Migration;

/**
 * Class m200130_011618_table_structure
 */
class m200130_011618_table_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $tables = Yii::$app->db->schema->getTableNames();
$dbType = $this->db->driverName;
$tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
$tableOptions_mssql = "";
$tableOptions_pgsql = "";
$tableOptions_sqlite = "";
/* MYSQL */
if (!in_array('task_project', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%task_project}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'code' => 'INT(11) NULL',
        'title' => 'VARCHAR(250) NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('task_record', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%task_record}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'category_id' => 'INT(11) NULL',
        'task_name' => 'VARCHAR(250) NULL',
        'task_description' => 'TEXT NULL',
        'date_raised' => 'DATE NULL',
        'time_raised' => 'VARCHAR(10) NULL',
        'date_done' => 'DATE NULL',
        'time_done' => 'VARCHAR(10) NULL',
        'date_target' => 'DATE NULL',
        'status_id' => 'INT(11) NULL',
        'is_active' => 'INT(11) NOT NULL',
        'is_read' => 'INT(11) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('task_status', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%task_status}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'code' => 'INT(11) NULL',
        'title' => 'VARCHAR(250) NULL',
    ], $tableOptions_mysql);
}
}
  
$this->execute('SET foreign_key_checks = 0');
$this->insert('{{%task_status}}',['id'=>'1','code'=>'1','title'=>'Immediate Changes to the System']);
$this->insert('{{%task_status}}',['id'=>'2','code'=>'2','title'=>'Kailangang Iparating kay Boss']);
$this->insert('{{%task_status}}',['id'=>'3','code'=>'3','title'=>'Needs Immediate Response/Action']);
$this->insert('{{%task_status}}',['id'=>'4','code'=>'4','title'=>'On-Going']);
$this->insert('{{%task_status}}',['id'=>'5','code'=>'5','title'=>'Accomplished']);
$this->insert('{{%task_status}}',['id'=>'6','code'=>'6','title'=>'Responded']);
$this->insert('{{%task_status}}',['id'=>'7','code'=>'7','title'=>'Forwarded to Boss']);
$this->insert('{{%task_status}}',['id'=>'8','code'=>'8','title'=>'Kailangang Iparating sa OPR']);
$this->insert('{{%task_status}}',['id'=>'9','code'=>'9','title'=>'Kailangan ng SIMULAN']);
$this->insert('{{%task_status}}',['id'=>'11','code'=>'11','title'=>'Check the system']);
$this->insert('{{%task_status}}',['id'=>'12','code'=>'12','title'=>'already checked the system']);
$this->insert('{{%task_status}}',['id'=>'13','code'=>'13','title'=>'Part of Enhancement of the System']);
$this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200130_011618_table_structure cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200130_011618_table_structure cannot be reverted.\n";

        return false;
    }
    */
}

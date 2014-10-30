<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class FeedCosineMigration_1017 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'feed_cosine',
            array(
            'columns' => array(
                new Column(
                    'tag',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 12,
                        'first' => true
                    )
                ),
                new Column(
                    'cosine',
                    array(
                        'type' => Column::TYPE_FLOAT,
                        'notNull' => true,
                        'size' => 1,
                        'after' => 'tag'
                    )
                )
            ),
            'indexes' => array(
                new Index('PRIMARY', array('tag'))
            ),
            'options' => array(
                'TABLE_TYPE' => 'BASE TABLE',
                'AUTO_INCREMENT' => '',
                'ENGINE' => 'InnoDB',
                'TABLE_COLLATION' => 'utf8_general_ci'
            )
        )
        );
    }
}

<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class SimilarMigration_1017 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'similar',
            array(
            'columns' => array(
                new Column(
                    'similar_id',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 21,
                        'first' => true
                    )
                ),
                new Column(
                    'feed_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'size' => 11,
                        'after' => 'similar_id'
                    )
                ),
                new Column(
                    'similar_feed_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'size' => 11,
                        'after' => 'feed_id'
                    )
                ),
                new Column(
                    'cosine',
                    array(
                        'type' => Column::TYPE_FLOAT,
                        'notNull' => true,
                        'size' => 1,
                        'after' => 'similar_feed_id'
                    )
                )
            ),
            'indexes' => array(
                new Index('PRIMARY', array('similar_id')),
                new Index('feed_id', array('feed_id')),
                new Index('similar_feed_id', array('similar_feed_id'))
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

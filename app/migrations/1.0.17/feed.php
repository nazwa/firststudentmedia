<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class FeedMigration_1017 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'feed',
            array(
            'columns' => array(
                new Column(
                    'feed_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'autoIncrement' => true,
                        'size' => 11,
                        'first' => true
                    )
                ),
                new Column(
                    'feed_source_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'feed_id'
                    )
                ),
                new Column(
                    'feed_category_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'feed_source_id'
                    )
                ),
                new Column(
                    'slug',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 255,
                        'after' => 'feed_category_id'
                    )
                ),
                new Column(
                    'date_loaded',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'size' => 11,
                        'after' => 'slug'
                    )
                ),
                new Column(
                    'title',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 300,
                        'after' => 'date_loaded'
                    )
                ),
                new Column(
                    'description',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 350,
                        'after' => 'title'
                    )
                ),
                new Column(
                    'description_long',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 1000,
                        'after' => 'description'
                    )
                ),
                new Column(
                    'image',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 300,
                        'after' => 'description_long'
                    )
                ),
                new Column(
                    'link',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 300,
                        'after' => 'image'
                    )
                ),
                new Column(
                    'date_published',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'size' => 11,
                        'after' => 'link'
                    )
                ),
                new Column(
                    'guid',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 300,
                        'after' => 'date_published'
                    )
                ),
                new Column(
                    'clicks',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'guid'
                    )
                ),
                new Column(
                    'score',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'clicks'
                    )
                ),
                new Column(
                    'votes',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'score'
                    )
                ),
                new Column(
                    'stars',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'votes'
                    )
                ),
                new Column(
                    'view',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 11,
                        'after' => 'stars'
                    )
                )
            ),
            'indexes' => array(
                new Index('PRIMARY', array('feed_id')),
                new Index('feed_source_id', array('feed_source_id')),
                new Index('feed_category_id', array('feed_category_id')),
                new Index('slug', array('slug'))
            ),
            'options' => array(
                'TABLE_TYPE' => 'BASE TABLE',
                'AUTO_INCREMENT' => '5599',
                'ENGINE' => 'InnoDB',
                'TABLE_COLLATION' => 'utf8_general_ci'
            )
        )
        );
    }
}

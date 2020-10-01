<?php

namespace Yosmy\Http;

use Yosmy\Mongo;

/**
 * @di\service({
 *     private: true
 * })
 */
class ManageRecordCollection extends Mongo\BaseManageCollection
{
    /**
     * @di\arguments({
     *     uri: "%mongo_uri%",
     *     db:  "%mongo_db%"
     * })
     *
     * @param string $uri
     * @param string $db
     */
    public function __construct(
        string $uri,
        string $db
    ) {
        parent::__construct(
            $uri,
            $db,
            'yosmy_http_records',
            [
                'typeMap' => array(
                    'root' => Record::class,
                ),
            ]
        );
    }
}

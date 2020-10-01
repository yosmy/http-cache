<?php

namespace Yosmy\Http;

use Yosmy\Mongo;

/**
 * @di\service()
 */
class AddRecord
{
    /**
     * @var ManageRecordCollection
     */
    private $manageCollection;

    /**
     * @param ManageRecordCollection $manageCollection
     */
    public function __construct(
        ManageRecordCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     * @param array  $response
     */
    public function add(
        string $method,
        string $uri,
        array $options,
        array $response
    ) {
        $this->manageCollection->insertOne([
            '_id' => uniqid(),
            'method' => $method,
            'uri' => $uri,
            'options' => $options,
            'response' => $response,
            'date' => new Mongo\DateTime(time() * 1000),
        ]);
    }
}
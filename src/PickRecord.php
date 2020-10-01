<?php

namespace Yosmy\Http;

/**
 * @di\service()
 */
class PickRecord
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
     *
     * @return Record
     *
     * @throws NonexistentRecordException
     */
    public function pick(
        string $method,
        string $uri
    ): Record {
        /** @var Record $record */
        $record = $this->manageCollection->findOne([
            'method' => $method,
            'uri' => $uri,
        ]);

        if (!$record) {
            throw new NonexistentRecordException();
        }

        return $record;
    }
}
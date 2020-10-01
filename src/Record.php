<?php

namespace Yosmy\Http;

use Yosmy\Mongo;

class Record extends Mongo\Document
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('_id');
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->offsetGet('method');
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->offsetGet('uri');
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->offsetGet('options');
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->offsetGet('response');
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->offsetGet('date');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        /** @var Mongo\DateTime $start */
        $date = $data['date'];
        $data['date'] = $date->toDateTime()->getTimestamp();

        parent::bsonUnserialize($data);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->id = $data->_id;

        unset($data->_id);

        return $data;
    }
}
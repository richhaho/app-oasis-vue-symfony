<?php
/*
 * This file has been automatically generated by TDBM.
 * You can edit this file as it will not be overwritten.
 */

declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\Exception\InvalidStringValue;
use App\Domain\Logging\LoggableModel;
use App\Domain\Model\Generated\AbstractDocument;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * The Document class maps the 'documents' table in database.
 *
 * @Type
 */
class Document extends AbstractDocument implements LoggableModel
{
    /**
     * @throws InvalidStringValue
     */
    public function setVisibility(string $visibility): void
    {
        $property = 'visibility';
        InvalidStringValue::notBlank($visibility, $property);
        InvalidStringValue::visibility($visibility, $property);
        parent::setVisibility($visibility);
    }

    /**
     * @throws InvalidStringValue
     */
    public function setName(string $name): void
    {
        $property = 'name';
        InvalidStringValue::notBlank($name, $property);
        parent::setName($name);
    }

    /**
     * @throws InvalidStringValue
     */
    public function setDescription(string $description): void
    {
        $property = 'description';
        InvalidStringValue::notBlank($description, $property);
        parent::setDescription($description);
    }
}

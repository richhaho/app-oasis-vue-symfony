<?php
/**
 * This file has been automatically generated by TDBM.
 *
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the FileDescriptor class instead!
 */

declare(strict_types=1);

namespace App\Domain\Model\Generated;

use App\Domain\Model\User;
use App\Domain\Model\Document;
use TheCodingMachine\TDBM\AbstractTDBMObject;
use TheCodingMachine\TDBM\ResultIterator;
use TheCodingMachine\TDBM\AlterableResultIterator;
use Ramsey\Uuid\Uuid;
use JsonSerializable;
use TheCodingMachine\TDBM\Schema\ForeignKeys;
use TheCodingMachine\GraphQLite\Annotations\Field as GraphqlField;

/**
 * The AbstractFileDescriptor class maps the 'file_descriptors' table in database.
 */
abstract class AbstractFileDescriptor extends \TheCodingMachine\TDBM\AbstractTDBMObject implements JsonSerializable
{

    /**
     * @var \TheCodingMachine\TDBM\Schema\ForeignKeys
     */
    private static $foreignKeys = null;

    /**
     * The constructor takes all compulsory arguments.
     *
     * @param string $name
     * @param int $size
     * @param string $upstream
     */
    public function __construct(string $name, int $size, string $upstream)
    {
        parent::__construct();
        $this->setName($name);
        $this->setSize($size);
        $this->setUpstream($upstream);
        $this->setId(Uuid::uuid1()->toString());
    }

    /**
     * The getter for the "id" column.
     *
     * @return string
     * @GraphqlField (outputType = "ID")
     */
    public function getId() : string
    {
        return $this->get('id', 'file_descriptors');
    }

    /**
     * The setter for the "id" column.
     *
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->set('id', $id, 'file_descriptors');
    }

    /**
     * Returns the User object bound to this object via the created_by column.
     *
     * @GraphqlField
     */
    public function getCreatedBy() : ?\App\Domain\Model\User
    {
        return $this->getRef('from__created_by__to__table__users__columns__id', 'file_descriptors');
    }

    /**
     * The setter for the User object bound to this object via the created_by column.
     */
    public function setCreatedBy(?\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__created_by__to__table__users__columns__id', $object, 'file_descriptors');
    }

    /**
     * Returns the User object bound to this object via the updated_by column.
     *
     * @GraphqlField
     */
    public function getUpdatedBy() : ?\App\Domain\Model\User
    {
        return $this->getRef('from__updated_by__to__table__users__columns__id', 'file_descriptors');
    }

    /**
     * The setter for the User object bound to this object via the updated_by column.
     */
    public function setUpdatedBy(?\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__updated_by__to__table__users__columns__id', $object, 'file_descriptors');
    }

    /**
     * The getter for the "name" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getName() : string
    {
        return $this->get('name', 'file_descriptors');
    }

    /**
     * The setter for the "name" column.
     *
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->set('name', $name, 'file_descriptors');
    }

    /**
     * The getter for the "size" column.
     *
     * @return int
     * @GraphqlField
     */
    public function getSize() : int
    {
        return $this->get('size', 'file_descriptors');
    }

    /**
     * The setter for the "size" column.
     *
     * @param int $size
     */
    public function setSize(int $size) : void
    {
        $this->set('size', $size, 'file_descriptors');
    }

    /**
     * The getter for the "upstream" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getUpstream() : string
    {
        return $this->get('upstream', 'file_descriptors');
    }

    /**
     * The setter for the "upstream" column.
     *
     * @param string $upstream
     */
    public function setUpstream(string $upstream) : void
    {
        $this->set('upstream', $upstream, 'file_descriptors');
    }

    /**
     * The getter for the "created_at" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getCreatedAt() : ?\DateTimeImmutable
    {
        return $this->get('created_at', 'file_descriptors');
    }

    /**
     * The setter for the "created_at" column.
     *
     * @param \DateTimeImmutable|null $created_at
     */
    public function setCreatedAt(?\DateTimeImmutable $created_at) : void
    {
        $this->set('created_at', $created_at, 'file_descriptors');
    }

    /**
     * The getter for the "updated_at" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getUpdatedAt() : ?\DateTimeImmutable
    {
        return $this->get('updated_at', 'file_descriptors');
    }

    /**
     * The setter for the "updated_at" column.
     *
     * @param \DateTimeImmutable|null $updated_at
     */
    public function setUpdatedAt(?\DateTimeImmutable $updated_at) : void
    {
        $this->set('updated_at', $updated_at, 'file_descriptors');
    }

    /**
     * Returns the list of Document pointing to this bean via the file_descriptor_id column.
     *
     * @return Document[]|\TheCodingMachine\TDBM\AlterableResultIterator
     * @GraphqlField
     */
    public function getDocuments() : \TheCodingMachine\TDBM\AlterableResultIterator
    {
        return $this->retrieveManyToOneRelationshipsStorage('documents', 'from__file_descriptor_id__to__table__file_descriptors__columns__id', ['documents.file_descriptor_id' => $this->get('id', 'file_descriptors')]);
    }

    /**
     * Returns the list of User pointing to this bean via the profile_picture_id column.
     *
     * @return User[]|\TheCodingMachine\TDBM\AlterableResultIterator
     * @GraphqlField
     */
    public function getUsers() : \TheCodingMachine\TDBM\AlterableResultIterator
    {
        return $this->retrieveManyToOneRelationshipsStorage('users', 'from__profile_picture_id__to__table__file_descriptors__columns__id', ['users.profile_picture_id' => $this->get('id', 'file_descriptors')]);
    }

    /**
     * Internal method used to retrieve the list of foreign keys attached to this bean.
     */
    protected static function getForeignKeys(string $tableName) : \TheCodingMachine\TDBM\Schema\ForeignKeys
    {
        if ($tableName === 'file_descriptors') {
            if (self::$foreignKeys === null) {
                self::$foreignKeys = new ForeignKeys([
                    'from__created_by__to__table__users__columns__id' => [
                        'foreignTable' => 'users',
                        'localColumns' => [
                            'created_by'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ],
                    'from__updated_by__to__table__users__columns__id' => [
                        'foreignTable' => 'users',
                        'localColumns' => [
                            'updated_by'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ]
                ]);
            }
            return self::$foreignKeys;
        }
        return parent::getForeignKeys($tableName);
    }

    /**
     * Serializes the object for JSON encoding.
     *
     * @param bool $stopRecursion Parameter used internally by TDBM to stop embedded
     * objects from embedding other objects.
     * @return array
     */
    public function jsonSerialize(bool $stopRecursion = false)
    {
        $array = [];
        $array['id'] = $this->getId();
        if ($stopRecursion) {
            $array['createdBy'] = ($object = $this->getCreatedBy()) ? ['id' => $object->getId()] : null;
        } else {
            $array['createdBy'] = ($object = $this->getCreatedBy()) ? $object->jsonSerialize(true) : null;
        }
        if ($stopRecursion) {
            $array['updatedBy'] = ($object = $this->getUpdatedBy()) ? ['id' => $object->getId()] : null;
        } else {
            $array['updatedBy'] = ($object = $this->getUpdatedBy()) ? $object->jsonSerialize(true) : null;
        }
        $array['name'] = $this->getName();
        $array['size'] = $this->getSize();
        $array['upstream'] = $this->getUpstream();
        $array['createdAt'] = ($date = $this->getCreatedAt()) ? $date->format('c') : null;
        $array['updatedAt'] = ($date = $this->getUpdatedAt()) ? $date->format('c') : null;
        return $array;
    }

    /**
     * Returns an array of used tables by this bean (from parent to child
     * relationship).
     *
     * @return string[]
     */
    public function getUsedTables() : array
    {
        return [ 'file_descriptors' ];
    }

    /**
     * Method called when the bean is removed from database.
     */
    public function onDelete() : void
    {
        parent::onDelete();
        $this->setRef('from__created_by__to__table__users__columns__id', null, 'file_descriptors');
        $this->setRef('from__updated_by__to__table__users__columns__id', null, 'file_descriptors');
    }

    public function __clone()
    {
        parent::__clone();
        $this->setId(Uuid::uuid1()->toString());
    }
}

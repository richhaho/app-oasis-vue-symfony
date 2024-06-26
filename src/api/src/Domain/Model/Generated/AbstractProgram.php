<?php
/**
 * This file has been automatically generated by TDBM.
 *
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the Program class instead!
 */

declare(strict_types=1);

namespace App\Domain\Model\Generated;

use App\Domain\Model\ProgramModel;
use App\Domain\Model\User;
use App\Domain\Model\Event;
use TheCodingMachine\TDBM\AbstractTDBMObject;
use TheCodingMachine\TDBM\ResultIterator;
use TheCodingMachine\TDBM\AlterableResultIterator;
use Ramsey\Uuid\Uuid;
use JsonSerializable;
use TheCodingMachine\TDBM\Schema\ForeignKeys;
use TheCodingMachine\GraphQLite\Annotations\Field as GraphqlField;

/**
 * The AbstractProgram class maps the 'programs' table in database.
 */
abstract class AbstractProgram extends \TheCodingMachine\TDBM\AbstractTDBMObject implements JsonSerializable
{

    /**
     * @var \TheCodingMachine\TDBM\Schema\ForeignKeys
     */
    private static $foreignKeys = null;

    /**
     * The constructor takes all compulsory arguments.
     *
     * @param string $name
     * @param string $description
     * @param string $type
     */
    public function __construct(string $name, string $description, string $type)
    {
        parent::__construct();
        $this->setName($name);
        $this->setDescription($description);
        $this->setType($type);
        $this->setId(Uuid::uuid1()->toString());
        $this->setStatus('created');
        $this->setDeleted(false);
    }

    /**
     * The getter for the "id" column.
     *
     * @return string
     * @GraphqlField (outputType = "ID")
     */
    public function getId() : string
    {
        return $this->get('id', 'programs');
    }

    /**
     * The setter for the "id" column.
     *
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->set('id', $id, 'programs');
    }

    /**
     * Returns the ProgramModel object bound to this object via the program_model_id
     * column.
     *
     * @GraphqlField
     */
    public function getProgramModel() : ?\App\Domain\Model\ProgramModel
    {
        return $this->getRef('from__program_model_id__to__table__program_models__columns__id', 'programs');
    }

    /**
     * The setter for the ProgramModel object bound to this object via the
     * program_model_id column.
     */
    public function setProgramModel(?\App\Domain\Model\ProgramModel $object) : void
    {
        $this->setRef('from__program_model_id__to__table__program_models__columns__id', $object, 'programs');
    }

    /**
     * Returns the User object bound to this object via the coach_id column.
     *
     * @GraphqlField
     */
    public function getCoach() : ?\App\Domain\Model\User
    {
        return $this->getRef('from__coach_id__to__table__users__columns__id', 'programs');
    }

    /**
     * The setter for the User object bound to this object via the coach_id column.
     */
    public function setCoach(?\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__coach_id__to__table__users__columns__id', $object, 'programs');
    }

    /**
     * Returns the User object bound to this object via the created_by column.
     *
     * @GraphqlField
     */
    public function getCreatedBy() : ?\App\Domain\Model\User
    {
        return $this->getRef('from__created_by__to__table__users__columns__id', 'programs');
    }

    /**
     * The setter for the User object bound to this object via the created_by column.
     */
    public function setCreatedBy(?\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__created_by__to__table__users__columns__id', $object, 'programs');
    }

    /**
     * Returns the User object bound to this object via the updated_by column.
     *
     * @GraphqlField
     */
    public function getUpdatedBy() : ?\App\Domain\Model\User
    {
        return $this->getRef('from__updated_by__to__table__users__columns__id', 'programs');
    }

    /**
     * The setter for the User object bound to this object via the updated_by column.
     */
    public function setUpdatedBy(?\App\Domain\Model\User $object) : void
    {
        $this->setRef('from__updated_by__to__table__users__columns__id', $object, 'programs');
    }

    /**
     * The getter for the "name" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getName() : string
    {
        return $this->get('name', 'programs');
    }

    /**
     * The setter for the "name" column.
     *
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->set('name', $name, 'programs');
    }

    /**
     * The getter for the "description" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getDescription() : string
    {
        return $this->get('description', 'programs');
    }

    /**
     * The setter for the "description" column.
     *
     * @param string $description
     */
    public function setDescription(string $description) : void
    {
        $this->set('description', $description, 'programs');
    }

    /**
     * The getter for the "status" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getStatus() : string
    {
        return $this->get('status', 'programs');
    }

    /**
     * The setter for the "status" column.
     *
     * @param string $status
     */
    public function setStatus(string $status) : void
    {
        $this->set('status', $status, 'programs');
    }

    /**
     * The getter for the "type" column.
     *
     * @return string
     * @GraphqlField
     */
    public function getType() : string
    {
        return $this->get('type', 'programs');
    }

    /**
     * The setter for the "type" column.
     *
     * @param string $type
     */
    public function setType(string $type) : void
    {
        $this->set('type', $type, 'programs');
    }

    /**
     * The getter for the "date_start" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getDateStart() : ?\DateTimeImmutable
    {
        return $this->get('date_start', 'programs');
    }

    /**
     * The setter for the "date_start" column.
     *
     * @param \DateTimeImmutable|null $date_start
     */
    public function setDateStart(?\DateTimeImmutable $date_start) : void
    {
        $this->set('date_start', $date_start, 'programs');
    }

    /**
     * The getter for the "date_end" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getDateEnd() : ?\DateTimeImmutable
    {
        return $this->get('date_end', 'programs');
    }

    /**
     * The setter for the "date_end" column.
     *
     * @param \DateTimeImmutable|null $date_end
     */
    public function setDateEnd(?\DateTimeImmutable $date_end) : void
    {
        $this->set('date_end', $date_end, 'programs');
    }

    /**
     * The getter for the "deleted" column.
     *
     * @return bool
     * @GraphqlField
     */
    public function getDeleted() : bool
    {
        return $this->get('deleted', 'programs');
    }

    /**
     * The setter for the "deleted" column.
     *
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted) : void
    {
        $this->set('deleted', $deleted, 'programs');
    }

    /**
     * The getter for the "created_at" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getCreatedAt() : ?\DateTimeImmutable
    {
        return $this->get('created_at', 'programs');
    }

    /**
     * The setter for the "created_at" column.
     *
     * @param \DateTimeImmutable|null $created_at
     */
    public function setCreatedAt(?\DateTimeImmutable $created_at) : void
    {
        $this->set('created_at', $created_at, 'programs');
    }

    /**
     * The getter for the "updated_at" column.
     *
     * @return \DateTimeImmutable|null
     * @GraphqlField
     */
    public function getUpdatedAt() : ?\DateTimeImmutable
    {
        return $this->get('updated_at', 'programs');
    }

    /**
     * The setter for the "updated_at" column.
     *
     * @param \DateTimeImmutable|null $updated_at
     */
    public function setUpdatedAt(?\DateTimeImmutable $updated_at) : void
    {
        $this->set('updated_at', $updated_at, 'programs');
    }

    /**
     * Returns the list of Event pointing to this bean via the program_id column.
     *
     * @return Event[]|\TheCodingMachine\TDBM\AlterableResultIterator
     * @GraphqlField
     */
    public function getEvents() : \TheCodingMachine\TDBM\AlterableResultIterator
    {
        return $this->retrieveManyToOneRelationshipsStorage('events', 'from__program_id__to__table__programs__columns__id', ['events.program_id' => $this->get('id', 'programs')]);
    }

    /**
     * Returns the list of User associated to this bean via the programs_users pivot table.
     *
     * @return \App\Domain\Model\User[]
     * @GraphqlField
     */
    public function getUsers() : array
    {
        return $this->_getRelationships('programs_users.program_id');
    }

    /**
     * Adds a relationship with User associated to this bean via the programs_users pivot table.
     *
     * @param \App\Domain\Model\User $user
     */
    public function addUser(\App\Domain\Model\User $user) : void
    {
        $this->addRelationship('programs_users', $user);
    }

    /**
     * Deletes the relationship with User associated to this bean via the programs_users pivot table.
     *
     * @param \App\Domain\Model\User $user
     */
    public function removeUser(\App\Domain\Model\User $user) : void
    {
        $this->_removeRelationship('programs_users', $user);
    }

    /**
     * Returns whether this bean is associated with User via the programs_users pivot table.
     *
     * @param \App\Domain\Model\User $user
     * @return bool
     */
    public function hasUser(\App\Domain\Model\User $user) : bool
    {
        return $this->hasRelationship('programs_users.program_id', $user);
    }

    /**
     * Sets all relationships with User associated to this bean via the programs_users pivot table.
     * Exiting relationships will be removed and replaced by the provided relationships.
     *
     * @param \App\Domain\Model\User[] $users
     * @return void
     */
    public function setUsers(array $users) : void
    {
        $this->setRelationships('programs_users.program_id', $users);
    }

    /**
     * Get the paths used for many to many relationships methods.
     *
     * @internal
     */
    public function _getManyToManyRelationshipDescriptor(string $pathKey) : \TheCodingMachine\TDBM\Utils\ManyToManyRelationshipPathDescriptor
    {
        switch ($pathKey) {
            case 'programs_users.program_id':
                return new \TheCodingMachine\TDBM\Utils\ManyToManyRelationshipPathDescriptor('users', 'programs_users', ['id'], ['user_id'], ['program_id']);
            default:
                return parent::_getManyToManyRelationshipDescriptor($pathKey);
        }
    }

    /**
     * Returns the list of keys supported for many to many relationships
     *
     * @internal
     * @return string[]
     */
    public function _getManyToManyRelationshipDescriptorKeys() : array
    {
        return array_merge(parent::_getManyToManyRelationshipDescriptorKeys(), ['programs_users.program_id']);
    }

    /**
     * Internal method used to retrieve the list of foreign keys attached to this bean.
     */
    protected static function getForeignKeys(string $tableName) : \TheCodingMachine\TDBM\Schema\ForeignKeys
    {
        if ($tableName === 'programs') {
            if (self::$foreignKeys === null) {
                self::$foreignKeys = new ForeignKeys([
                    'from__coach_id__to__table__users__columns__id' => [
                        'foreignTable' => 'users',
                        'localColumns' => [
                            'coach_id'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ],
                    'from__created_by__to__table__users__columns__id' => [
                        'foreignTable' => 'users',
                        'localColumns' => [
                            'created_by'
                        ],
                        'foreignColumns' => [
                            'id'
                        ]
                    ],
                    'from__program_model_id__to__table__program_models__columns__id' => [
                        'foreignTable' => 'program_models',
                        'localColumns' => [
                            'program_model_id'
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
            $array['programModel'] = ($object = $this->getProgramModel()) ? ['id' => $object->getId()] : null;
        } else {
            $array['programModel'] = ($object = $this->getProgramModel()) ? $object->jsonSerialize(true) : null;
        }
        if ($stopRecursion) {
            $array['coach'] = ($object = $this->getCoach()) ? ['id' => $object->getId()] : null;
        } else {
            $array['coach'] = ($object = $this->getCoach()) ? $object->jsonSerialize(true) : null;
        }
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
        $array['description'] = $this->getDescription();
        $array['status'] = $this->getStatus();
        $array['type'] = $this->getType();
        $array['dateStart'] = ($date = $this->getDateStart()) ? $date->format('c') : null;
        $array['dateEnd'] = ($date = $this->getDateEnd()) ? $date->format('c') : null;
        $array['deleted'] = $this->getDeleted();
        $array['createdAt'] = ($date = $this->getCreatedAt()) ? $date->format('c') : null;
        $array['updatedAt'] = ($date = $this->getUpdatedAt()) ? $date->format('c') : null;
        if (!$stopRecursion) {
            $array['users'] = array_map(function (User $object) {
                return $object->jsonSerialize(true);
            }, $this->getUsers());
        };
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
        return [ 'programs' ];
    }

    /**
     * Method called when the bean is removed from database.
     */
    public function onDelete() : void
    {
        parent::onDelete();
        $this->setRef('from__program_model_id__to__table__program_models__columns__id', null, 'programs');
        $this->setRef('from__coach_id__to__table__users__columns__id', null, 'programs');
        $this->setRef('from__created_by__to__table__users__columns__id', null, 'programs');
        $this->setRef('from__updated_by__to__table__users__columns__id', null, 'programs');
    }

    public function __clone()
    {
        $this->getUsers();

        parent::__clone();
        $this->setId(Uuid::uuid1()->toString());
    }
}

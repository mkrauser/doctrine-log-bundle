<?php

namespace Mb\DoctrineLogBundle\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * Class Log
 *
 * @ORM\Entity
 * @ORM\Table(name="mb_entity_log")
 *
 * @package CoreBundle\Entity
 */
class Log
{
    use BlameableEntity;

    /**
     * Action create
     */
    const ACTION_CREATE = 'create';

    /**
     * Action update
     */
    const ACTION_UPDATE = 'update';

    /**
     * Action remove
     */
    const ACTION_REMOVE = 'remove';

    /**
     * @var int $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $objectClass
     *
     * @ORM\Column(name="object_class", type="string")
     */
    protected $objectClass;

    /**
     * @var string $foreignKey
     *
     * @ORM\Column(name="foreign_key", type="string", length=1024)
     */
    protected $foreignKey;

    /**
     * @var string $action
     *
     * @ORM\Column(name="action", type="string")
     */
    protected $action;

    /**
     * @var array $changes
     *
     * @ORM\Column(name="changes", type="json", nullable=true)
     */
    protected $changes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime_immutable", nullable=false)
     */
    protected $createdAt;

    /**
     * Log constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set objectClass
     *
     * @param string $objectClass
     *
     * @return $this
     */
    public function setObjectClass($objectClass) : Log
    {
        $this->objectClass = $objectClass;

        return $this;
    }

    /**
     * Get objectClass
     *
     * @return string
     */
    public function getObjectClass() : string
    {
        return $this->objectClass;
    }

    /**
     * Set foreignKey
     *
     * @param integer $foreignKey
     *
     * @return $this
     */
    public function setForeignKey($foreignKey) : Log
    {
        $this->foreignKey = $foreignKey;

        return $this;
    }

    /**
     * Get foreignKey
     *
     * @return int
     */
    public function getForeignKey() : int
    {
        return $this->foreignKey;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return $this
     */
    public function setAction($action) : Log
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * Returns the pretty class name
     *
     * @return string
     */
    public function getPrettyClass() : string
    {
        return substr($this->objectClass, 18, strlen($this->objectClass));
    }

    /**
     * Get changes
     *
     * @return array
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * Set changes
     *
     * @param array $changes
     * @return Log
     */
    public function setChanges($changes): Log
    {
        $this->changes = $changes;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Returns the sonata format
     *
     * @return array
     */
    public function getChangesSonata()
    {
        return json_encode(json_decode($this->changes), JSON_PRETTY_PRINT);
    }
    
    /**
     * @return mixed
     */
    public function getChangesArray()
    {
        return json_decode($this->changes, true);
    }
}

<?php

namespace RbacTest\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZfcUser\Entity\UserInterface;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="user_id")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string",length=50,nullable=true,name="display_name")
     * @var string
     */
    protected $displayName;

    /**
     * @ORM\Column(type="string",length=128)
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="smallint")
     * @var int
     */
    protected $state = 0;

    /**
     * @ORM\Column(type="string",length=20)
     * @var string
     */
    protected $role;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     * @var string
     */
    protected $username;

    public function __construct()
    {
        $this->registeredAt = new DateTime();
        $this->role = 'member';
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setRegisteredAt($registeredAt)
    {
        $this->registeredAt = $registeredAt;
    }

    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param string $username
     * @return UserInterface
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}

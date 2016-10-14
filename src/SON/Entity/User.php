<?php

namespace SON\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface; //Interface a ser implementada

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="SON\Entity\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;
    
    /**
     * @ORM\Column(type="string", lenght=100)
     */
    public $username;
    
    /**
     * @ORM\Column(type="string", lenght=100)
     */
    public $password;
    
    /**
     * @ORM\Column(type="string", lenght=100)
     */
    public $plainPassword;
    
    /**
     * @ORM\Column(type="string", lenght=100)
     */    
    public $roles = array('ROLE_USER');
    
    /**
     * @ORM\Column(type="datetime", lenght=100)
     */
    public $createdAt;
    
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
    public function getSalt()
    {
        return NULL;
    }
    
    public function eraseCredentials()
    {
        $this->plainPassword = NULL;
    }
    
    public function __toString()
    {
        return $this->getUsername();
    }
    
    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->getUsername(),
            'salt' => $this->getSalt(),
            'roles' => $this->getRoles(),
            'password' => $this->getPassword()
        ];
    }

}
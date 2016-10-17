<?php
namespace SON\Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserProviderInterface
{
    private $passwordEncoder;
    
    public function setPasswordEncoder(PasswordEncoderInterface $passwordEncoder)
    {
        $this->$passwordEncoder = $$passwordEncoder;
    }
    
    public function loadUserByUsername($username)
    {
        
    }

    public function refreshUser(UserInterface $user)
    {
        
    }

    public function supportsClass($class)
    {
        
    }

}


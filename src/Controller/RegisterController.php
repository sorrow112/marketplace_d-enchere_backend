<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[asController]
class RegisterController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager,private UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
    }
    public function __invoke($data)
    {

        $user = new User();
        $user->setName($data->getName());
        $user->setDisplayName($data->getDisplayName());
        $user->setEmail($data->getEmail());
        $plainPassword = $data->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plainPassword
        );
        $user->setPassword($hashedPassword);
        $user->setTelephone($data->getTelephone());
        $user->setAvatar($data->getAvatar());
        $user->setIsActive($data->getIsActive());
        $user->setBirthDate($data->getBirthdate());
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return json_encode($user);
    }
}
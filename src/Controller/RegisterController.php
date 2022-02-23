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
        //just replacing the plainPassword with a hashed version 
        $plainPassword = $data->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword(
            $data,
            $plainPassword
        );
        $data->setPassword($hashedPassword);
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        return json_encode($data);
    }
}
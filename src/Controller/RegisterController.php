<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;

#[asController]
class RegisterController extends AbstractController
{
    private $entityManager;
    private $validator;
    public function __construct(ValidatorInterface $validator,EntityManagerInterface $entityManager,private UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
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
        $errors = $this->validator->validate($data);
        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        return json_encode($data);
    }
}
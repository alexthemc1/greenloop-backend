<?php

namespace App\State;

use App\Entity\User;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserPasswordHasherProcessor implements ProcessorInterface
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private ProcessorInterface $persistProcessor
    ) {}

    public function process(
        mixed $data,
        Operation $operation,
        array $uriVariables = [],
        array $context = []
    ): mixed {

        // Vérifie que c'est bien un User
        if (!$data instanceof User) {
            return $this->persistProcessor->process(
                $data,
                $operation,
                $uriVariables,
                $context
            );
        }

        // Si un plainPassword est envoyé
        if ($data->getPlainPassword()) {

            // Hash du mot de passe
            $hashedPassword = $this->passwordHasher->hashPassword(
                $data,
                $data->getPlainPassword()
            );

            // Sauvegarde du hash
            $data->setPassword($hashedPassword);

            // Nettoyage mémoire
            $data->setPlainPassword(null);
        }

        // Sauvegarde Doctrine
        return $this->persistProcessor->process(
            $data,
            $operation,
            $uriVariables,
            $context
        );
    }
}
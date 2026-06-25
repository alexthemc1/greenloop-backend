<?php

namespace App\Controller\Api;

use App\Entity\Address;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class AddressController extends AbstractController
{
    #[Route('/api/addresses', name: 'api_address_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['message' => 'Accès refusé'], 401);
        }

        $data = json_decode($request->getContent(), true);

        $address = new Address();

        $address->setStreet($data['street'] ?? '');
        $address->setNumber($data['number'] ?? '');
        $address->setPostalCode($data['postalCode'] ?? '');
        $address->setCity($data['city'] ?? '');
        $address->setCountry($data['country'] ?? '');
        $address->setPhone($data['phone'] ?? null);
        $address->setIsDefault($data['isDefault'] ?? false);

        $address->setUser($user);

        $em->persist($address);
        $em->flush();

        return $this->json($address, 201, [], [
            'groups' => ['user:read']
        ]);
    }

    #[Route('/api/addresses/{id}', name: 'api_address_update', methods: ['PATCH'])]
    public function update(Address $address, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (
            !$user || (!$this->isGranted('ROLE_ADMIN') && $address->getUser() !== $user)
        ) {
            return new JsonResponse(['message' => 'Accès refusé'], 403);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['street'])) {
            $address->setStreet($data['street']);
        }

        if (isset($data['number'])) {
            $address->setNumber($data['number']);
        }

        if (isset($data['postalCode'])) {
            $address->setPostalCode($data['postalCode']);
        }

        if (isset($data['city'])) {
            $address->setCity($data['city']);
        }

        if (isset($data['country'])) {
            $address->setCountry($data['country']);
        }

        if (array_key_exists('phone', $data)) {
            $address->setPhone($data['phone']);
        }

        if (isset($data['isDefault'])) {
            $address->setIsDefault((bool) $data['isDefault']);
        }

        $em->flush();

        return $this->json($address, 200, [], [
            'groups' => ['user:read']
        ]);
    }
}

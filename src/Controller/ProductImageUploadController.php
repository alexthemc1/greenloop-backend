<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductImage;
use App\Service\ImageConverter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;

final class ProductImageUploadController
{
    public function __invoke(
        Request $request,
        EntityManagerInterface $em,
        ImageConverter $imageConverter,
        KernelInterface $kernel
    ): JsonResponse {

        $file = $request->files->get('file');
        $productId = $request->request->get('productId');
        $typeImage = $request->request->get('typeImage');

        if (!$file) {
            return new JsonResponse(['error' => 'Aucun fichier'], 400);
        }

        $product = $em->getRepository(Product::class)->find($productId);

        if (!$product) {
            return new JsonResponse(['error' => 'Produit introuvable'], 404);
        }

        $image = new ProductImage();
        $image->setImageFile($file);
        $image->setProduct($product);
        $image->setTypeImage($typeImage);

        $em->persist($image);
        $em->flush();

        $relativePath = $image->getImagePath();
        $filename = basename($relativePath);

        $fullPath = $kernel->getProjectDir()
            . '/public/images/products/'
            . $filename;

        $webpPath = $imageConverter->convertToWebp($fullPath);

        $image->setImagePath(basename($webpPath));
        $em->flush();

        return new JsonResponse([
            'success' => true,
            'id' => $image->getId(),
            'imagePath' => '/images/products/' . $image->getImagePath(),
            'typeImage' => $image->getTypeImage()
        ]);
    }
}
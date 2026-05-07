<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\ProductImage;
use App\Entity\Address;
use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Cart;
use App\Entity\CartItem;
use App\Entity\Comment;
use App\Entity\NutritionalIcon;
use App\Entity\ProductNutritionalIcon;
use App\Entity\Wishlist;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;
use App\Data\Catalog;
use App\Data\Reviews;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher) {}

    public function load(ObjectManager $manager): void
    {

        $catalog = Catalog::get();
        $reviews = Reviews::get();


        $faker = Factory::create('fr_BE');

        // =====================
        // ADMIN
        // =====================
        $adminUser = new User();
        $adminUser->setFirstname('Admin');
        $adminUser->setLastname('Admin');
        $adminUser->setEmail('admin@test.be');
        $adminUser->setCreatedAt(new \DateTimeImmutable());
        $adminUser->setRoles(['ROLE_ADMIN']);
        $adminUser->setPassword(
            $this->passwordHasher->hashPassword($adminUser, 'password')
        );

        $manager->persist($adminUser);

        // =====================
        // UTILISATEURS
        // =====================
        $users = [$adminUser];

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail($faker->unique()->safeEmail());
            $user->setCreatedAt(new \DateTimeImmutable());
            $user->setProfileImage('https://i.pravatar.cc/150?img=' . rand(1, 70)); // avatar aléatoire
            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, 'password')
            );

            $manager->persist($user);
            $users[] = $user;
        }

        // =====================
        // CATEGORIES
        // =====================
        $categories = [];

        foreach (['Fruits', 'Légumes', 'Paniers'] as $name) {
            $category = new Category();
            $category->setName($name);
            $category->setSlug(strtolower($name));

            $manager->persist($category);
            $categories[] = $category;
        }

        // =====================
        // ICONES NUTRITIONELLES
        // =====================
        $nutritionalIcons = [];
        $iconData = [
            ['Vitamine C', '#ff6b6b', 'Riche en vitamine C'],
            ['Fibres', '#2ecc71', 'Source de fibres'],
            ['Antioxydants', '#9b59b6', 'Riche en antioxydants'],
            ['Hydratation', '#3498db', 'Fort pouvoir hydratant'],
            ['Énergie naturelle', '#f39c12', 'Apporte de l’énergie'],
            ['Faible en calories', '#95a5a6', 'Faible en calories'],
            ['Riche en vitamines', '#f1c40f', 'Riche en vitamines'],
            ['Minéraux', '#7f8c8d', 'Source de minéraux'],
            ['Digestion facile', '#27ae60', 'Facile à digérer'],
            ['Équilibre alimentaire', '#16a085', 'Contribue à une alimentation équilibrée'],
        ];

        foreach ($iconData as [$name, $color, $description]) {
            $icon = new NutritionalIcon();
            $icon->setName($name);
            $icon->setColor($color);
            $icon->setIconPath('icons/' . strtolower(str_replace(' ', '-', $name)) . '.svg');
            $icon->setDescription($description);

            $manager->persist($icon);
            $nutritionalIcons[] = $icon;
        }

        // =====================
        // PRODUITS
        // =====================
        $products = [];

        foreach ($catalog as $data) {
            $product = new Product();

            $product->setName($data['name']);
            $product->setSlug(strtolower(str_replace(' ', '-', $data['name'])));
            $product->setPrice((string) $data['price']);
            $product->setStock(rand(20, 150));
            $product->setCreatedAt(new \DateTimeImmutable('-' . rand(0, 30) . ' days'));
            $product->setWeight($data['weight']);
            $product->setKeywords([$data['name'], $data['category']]);
            $product->setDiscountPercent(rand(1, 100) <= 70 ? null : rand(10, 65));
            // catégorie
            foreach ($categories as $cat) {
                if ($cat->getName() === $data['category']) {
                    $product->setCategory($cat);
                }
            }

            $product->setDescriptionShort($data['description']);

            $product->setDescriptionLong($data['descriptionLong'] ?? null);
            $product->setOrigin($data['origin'] ?? null);
            $product->setTaste($data['taste'] ?? null);
            $product->setUsageAdvice($data['usageAdvice'] ?? null);
            $product->setConservation($data['conservation'] ?? null);

            $product->setIsPopular(in_array($data['name'], ['Banane', 'Pomme Gala']));
            $product->setIsFeatured(str_contains($data['name'], 'Panier'));

            $manager->persist($product);
            $products[] = $product;

            $slug = $product->getSlug();

            // Main IMAGE
            $mainImage = new ProductImage();
            $mainImage->setImagePath("/images/products/{$slug}-main.png");
            $mainImage->setType('main');
            $mainImage->setProduct($product);
            $manager->persist($mainImage);
            // GALERIE
            for ($i = 1; $i <= rand(3, 4); $i++) {
                $image = new ProductImage();
                $image->setImagePath("/images/products/{$slug}-gallery-{$i}.png");
                $image->setType('gallery');
                $image->setProduct($product);
                $manager->persist($image);
            }
            //  INFO
            $infoImage = new ProductImage();
            $infoImage->setImagePath("/images/products/{$slug}-info.png");
            $infoImage->setType('info');
            $infoImage->setProduct($product);
            $manager->persist($infoImage);


            // icônes
            foreach ($nutritionalIcons as $icon) {
                if (in_array($icon->getName(), $data['icons'])) {
                    $pivot = new ProductNutritionalIcon();
                    $pivot->setProduct($product);
                    $pivot->setNutritionalIcon($icon);
                    $manager->persist($pivot);
                }
            }
        }

        // =====================
        // ADDRESSES
        // =====================
        $addresses = [];

        foreach ($users as $user) {
            $address = new Address();
            $address->setStreet($faker->streetName());
            $address->setNumber($faker->buildingNumber());
            $address->setPostalCode($faker->postcode());
            $address->setCity($faker->city());
            $address->setCountry('Belgique');
            $address->setPhone($faker->phoneNumber());
            $address->setIsDefault(true);
            $address->setUser($user);

            $manager->persist($address);
            $addresses[] = $address;
        }

        // =====================
        // COMMANDES
        // =====================
        foreach ($users as $index => $user) {

            if (!isset($addresses[$index])) continue;

            $order = new Order();
            $order->setUser($user);
            $order->setAddress($addresses[$index]);
            $order->setStatus($faker->randomElement(['pending', 'completed', 'cancelled']));
            $order->setPaymentMethod($faker->randomElement(['card', 'paypal']));
            $order->setPaymentStatus($faker->randomElement(['paid', 'unpaid']));
            $order->setCreatedAt(new \DateTimeImmutable());

            $total = 0;

            foreach ($faker->randomElements($products, rand(1, 4)) as $product) {

                $qty = rand(1, 3);

                $item = new OrderItem();
                $item->setTheOrder($order);
                $item->setProduct($product);
                $item->setQuantity($qty);
                $item->setPriceAtPurchase($product->getPrice());

                $total += $product->getPriceAsFloat() * $qty;

                $manager->persist($item);
            }

            $order->setTotalPrice($total);
            $manager->persist($order);
        }

        // =====================
        // COMMENTAIRES
        // =====================
        foreach ($products as $product) {
            foreach ($faker->randomElements($users, rand(0, 4)) as $user) {

                $comment = new Comment();
                $comment->setContent($faker->randomElement($reviews));
                $comment->setStatus($faker->randomElement(['pending', 'approved', 'rejected']));
                $comment->setCreatedAt(new \DateTimeImmutable());
                $comment->setUser($user);
                $comment->setProduct($product);

                $manager->persist($comment);
            }
        }

        // =====================
        // PANIERS
        // =====================
        foreach ($users as $user) {

            $cart = new Cart();
            $cart->setCreatedAt(new \DateTimeImmutable());
            $cart->setUser($user);

            $manager->persist($cart);

            foreach ($faker->randomElements($products, rand(0, 4)) as $product) {

                $item = new CartItem();
                $item->setCart($cart);
                $item->setProduct($product);
                $item->setQuantity(rand(1, 5));

                $manager->persist($item);
            }
        }

        // =====================
        // LISTE DE SOUHAITS
        // =====================
        foreach ($users as $user) {

            foreach ($faker->randomElements($products, rand(0, 5)) as $product) {

                $wishlist = new Wishlist();
                $wishlist->setCreatedAt(new \DateTimeImmutable());
                $wishlist->setUser($user);
                $wishlist->setProduct($product);

                $manager->persist($wishlist);
            }
        }

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@example.com');
            // Password with hashencoder: 'password'
            $user->setPassword('password')
            if($i == 0) {
                $user->setRoles(['ROLE_ADMIN']);
            }
            $manager->persist($user);
        }

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName('Category ' . $i);
            $category->setImageUrl('https://picsum.photos/200/300');
            $manager->persist($category);
        }

        for ($i = 0; $i < 200; $i++) {
            $product = new Product();
            $product->setName('Product ' . $i);
            $product->setImageUrl('https://picsum.photos/200/300');
            $product->setDescription('Description ' . $i);
            $product->setStock(rand(0, 200));
            $product->setPrice(rand(0, 10)/10 + rand(1, 20));
            $product->setCategories($manager->getRepository(Category::class)->find(rand(1, 10)));
            $manager->persist($product);
        }

        $manager->flush();
    }
}

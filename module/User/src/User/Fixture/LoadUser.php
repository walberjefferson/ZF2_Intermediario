<?php

namespace User\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;

use User\Entity\User;

class LoadUser extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setNome("Walber")
            ->setEmail("walberjefferson@hotmail.com")
            ->setPassword(123456)
            ->setActive(true);

        $manager->persist($user);
        $manager->flush();
    }
}
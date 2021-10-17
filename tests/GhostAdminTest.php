<?php

/**
 * Class GhostTest.
 */
class GhostAdminTest extends GhostPHPUnit
{
    public function test_getPagesAll()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Posts($client);
        $result = $service->find();
        $this->assertArrayHasKey('posts', $result);
    }

    public function test_getPagesFindById()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Posts($client);
        $result = $service->findById('615c0203eb1d66000ce4329c');
        $this->assertArrayHasKey('posts', $result);
    }

    public function test_getPagesFindBySlug()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Posts($client);
        $result = $service->findBySlug('entreprises-pourquoi-est-il-essentiel-de-former-vos-equipes-au-web');
        $this->assertArrayHasKey('posts', $result);
    }

    public function test_getPagesUpdate()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Posts($client);
        $result = $service->update('615c0203eb1d66000ce4329c', [
            'codeinjection_head' => '<script></script>'
        ]);
        $this->assertArrayHasKey('posts', $result);
    }

    public function test_getSite()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Site($client);
        $result = $service->get();
        $this->assertArrayHasKey('site', $result);
    }

    public function test_getTags()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Tags($client);
        $result = $service->find();
        $this->assertArrayHasKey('tags', $result);
    }

    public function test_getPages()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Pages($client);
        $result = $service->find();
        $this->assertArrayHasKey('pages', $result);
    }

    public function test_getUsers()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new \Davaxi\Ghost\Service\AdminApi\Users($client);
        $result = $service->find();
        $this->assertArrayHasKey('users', $result);
    }

}
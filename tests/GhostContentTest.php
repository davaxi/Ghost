<?php

use \Davaxi\Ghost\Service\ContentApi\{Pages,Posts,Authors,Tags,Settings};

/**
 * Class GhostTest.
 */
class GhostContentTest extends GhostPHPUnit
{
    public function test_getPagesAll()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new Posts($client);
        $result = $service->find();
        $this->assertArrayHasKey('posts', $result);
    }

    public function test_getSettings()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new Settings($client);
        $result = $service->get();
        $this->assertArrayHasKey('settings', $result);
    }

    public function test_getTags()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new Tags($client);
        $result = $service->find();
        $this->assertArrayHasKey('tags', $result);
    }

    public function test_getPages()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new Pages($client);
        $result = $service->find();
        $this->assertArrayHasKey('pages', $result);
    }

    public function test_getAuthors()
    {
        $client = new GhostClientMockup();
        $client->loadFromEnvironment();

        $service = new Authors($client);
        $result = $service->find();
        $this->assertArrayHasKey('authors', $result);
    }
}
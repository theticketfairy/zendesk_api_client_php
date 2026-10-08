<?php

namespace Zendesk\API\UnitTests\Core;

use Zendesk\API\UnitTests\BasicTest;

/**
 * Tags test class
 */
class TagsTest extends BasicTest
{
    /**
     * Test that the Tags resource class actually creates the correct routes:
     *
     * tickets/{id}/tags.json
     * topics/{id}/tags.json
     * organizations/{id}/tags.json
     * users/{id}/tags.json
     */
    public function testGetRoute()
    {
        $route = $this->client->tickets(12345)->tags()->getRoute('find', ['id' => 12345]);
        $this->assertEquals('tickets/12345/tags.json', $route);
    }

    public function testFindUnchained()
    {
        $this->expectException(\Zendesk\API\Exceptions\CustomException::class);
        $this->client->tags()->find(1);
    }

    public function testFindNoChainedParameter()
    {
        $this->expectException(\Zendesk\API\Exceptions\CustomException::class);
        $this->client->tickets()->tags()->find(1);
    }
}

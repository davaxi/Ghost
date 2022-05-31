<?php

namespace Davaxi\Ghost\Service\ContentApi;

use Davaxi\Ghost\Service\ContentApi;

class Posts extends ContentApi
{
    use ContentApi\_\Entity;

    const BASE_URL = '{url}/ghost/api/content/posts{path}';
}
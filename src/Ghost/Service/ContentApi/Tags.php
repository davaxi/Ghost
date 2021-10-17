<?php

namespace Davaxi\Ghost\Service\ContentApi;

use Davaxi\Ghost\Service\ContentApi;

class Tags extends ContentApi
{
    use ContentApi\_\Entity;

    const BASE_URL = '{url}/ghost/api/{version}/content/tags{path}';
}
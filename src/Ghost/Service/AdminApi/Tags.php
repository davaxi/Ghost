<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Service\AdminApi;

class Tags extends AdminApi
{
    use AdminApi\_\Entity;

    const SERVICE_KEY = 'tags';
    const BASE_URL = '{url}/ghost/api/{version}/admin/tags{path}';
}
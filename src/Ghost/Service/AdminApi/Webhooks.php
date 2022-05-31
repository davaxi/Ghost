<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Service\AdminApi;

class Webhooks extends AdminApi
{
    use AdminApi\_\Entity;

    const SERVICE_KEY = 'webhooks';
    const BASE_URL = '{url}/ghost/api/admin/webhooks{path}';

}
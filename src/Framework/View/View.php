<?php

namespace App\Framework\View;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;

class View
{
    private string $baseTemplate;
    public const FLASH_SUCCESS = "FLASH_SUCCESS";
    public const FLASH_FAILURE = "FLASH_FAILURE";

    public function __construct()
    {
        $this->baseTemplate = TEMPLATE_DIRECTORY . 'template01.php';
    }

    /**
     * @throws NotFoundException
     * @throws ResourceNotFound
     */
    public function render(string $childTemplate, array $data = []): string
    {
        $childTemplate = TEMPLATE_DIRECTORY . $childTemplate;

        if (!file_exists($childTemplate)) {
            throw new ResourceNotFound();
        }

        ob_start();
        extract($data);
        require($this->baseTemplate);
        return ob_get_clean();
    }
}

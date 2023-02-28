<?php

namespace App\Framework\Form;

use DateTime;

class Token
{
    private DateTime $tokenDate;

    /**
     * @return DateTime
     */
    public function getTokenDate(): DateTime
    {
        return $this->tokenDate;
    }

    public function __construct()
    {
        $this->generateToken();
    }

    public function getName(): string
    {
        return form::TOKEN_FIELD_NAME;
    }

    public function generateToken()
    {
        $_SESSION['token'] = $this->tokenDate = new DateTime();
    }

    public function getType(): string
    {
        // TODO: Implement getType() method.
    }

    public function __toString(): string
    {
        $token = [];
        $token[] = sprintf('<input type="hidden"  name="%s"/>', form::TOKEN_FIELD_NAME);
        return implode($token);
    }

    public function isValid(): bool
    {
        if ($_SESSION['token'] === $this->tokenDate) {
            return true;
        }
        return false;
    }
}
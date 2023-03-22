<?php
declare(strict_types=1);

class Template
{
    public const TEXT = 1;
    public const FORM = 2;
    public const TYPE_ACCEPTED = [self::TEXT, self::FORM];

    public string $childTemplate;
    public int $type;
    public ?array $parameters = [];


    public function __construct(string $childTemplate, int $type, array $parameters = [])
    {
        $this->childTemplate = $childTemplate;
        if (!in_array($type, self::TYPE_ACCEPTED)) {
            throw new LogicException();
        }
        $this->type = $type;
        $this->parameters = $parameters;
    }

    public function getGetChildTemplate(): string
    {
        return $this->childTemplate;
    }


    public function getType(): int
    {
        return $this->type;
    }

    public function getChildTemplate(): string
    {
        return $this->childTemplate;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    public function __toString(): string
    {
        if (empty($this->type)) {
            throw new LogicException();
        }

        $data = null;
        switch ($this->type) {
            case 1:
                $data = sprintf('%s', '');
                break;
            case 2:
                $data = sprintf(
                    '
                            <h1></h1>
                            <?php
                                /**
                                 * @var %s
                                 */
                                echo $form
                            ?>
                        '
                    , '');
                break;
            case 3:
                $data = sprintf('ere%s', '');
                break;
        }
        return $data;
    }
}
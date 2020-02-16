<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

class Set extends \ArrayIterator implements ISet
{

    /** @var bool */
    private $operatorAnd;

    /** @var bool */
    private $negated;


    public function __construct(array $array, bool $operatorAnd, bool $negated)
    {
        parent::__construct($array);
        $this->operatorAnd = $operatorAnd;
        $this->negated = $negated;
    }

    public function isOperatorAnd(): bool
    {
        return $this->operatorAnd;
    }

    public function isNegated(): bool
    {
        return $this->negated;
    }

}

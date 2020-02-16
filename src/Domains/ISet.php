<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

interface ISet
{

    public function isOperatorAnd(): bool;

    public function isNegated(): bool;

}

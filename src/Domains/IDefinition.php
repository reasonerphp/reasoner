<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

interface IDefinition
{

    public function getPropertyId(): int;

    public function getTypeOfRestriction(): int;

    public function getCount(): ?int;

    public function getSet(): ?ISet;

}

<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

class Definition implements  IDefinition
{

    /** @var int */
    private $propertyId;

    /** @var int */
    private $typeOfRestriction;

    /** @var null|int */
    private $count;

    /** @var null|Iset */
    private $set;


    public function __construct(int $propertyId, int $typeOfRestriction, ?int $count, ?Iset $set)
    {
        $this->propertyId = $propertyId;
        $this->typeOfRestriction = $typeOfRestriction;
        $this->count = $count;
        $this->set = $set;
    }

    public function getPropertyId(): int
    {
        return $this->propertyId;
    }

    public function getTypeOfRestriction(): int
    {
        return $this->typeOfRestriction;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function getSet(): ?ISet
    {
        return $this->set;
    }

}
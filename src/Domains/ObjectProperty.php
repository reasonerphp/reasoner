<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

class ObjectProperty implements IObjectProperty
{

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var int */
    private $parentId;

    /** @var bool */
    private $functional;

    /** @var null|int */
    private $inversePropertyId;

    /** @var bool */
    private $transitive;

    /** @var IDomain */
    private $domain;

    /** @var IRange */
    private $range;


    public function __construct(int $id, string $name, string $description, int $parentId, bool $functional, ?int $inversePropertyId, bool $transitive, IDomain $domain, IRange $range)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->parentId = $parentId;
        $this->functional = $functional;
        $this->inversePropertyId = $inversePropertyId;
        $this->transitive = $transitive;
        $this->domain = $domain;
        $this->range = $range;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function isFunctional(): bool
    {
        return $this->functional;
    }

    public function getInversePropertyId(): ?int
    {
        return $this->inversePropertyId;
    }

    public function isTransitive(): bool
    {
        return $this->transitive;
    }

    public function getDomainSet(): IDomain
    {
        return $this->domain;
    }

    public function getRangeSet(): IRange
    {
        return $this->range;
    }

}

<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

class ObjectClass implements IObjectClass
{

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var int */
    private $parentId;

    /** @var DisjointList */
    private $disjointList;

    /** @var DefinitionList */
    private $definitionList;

    /** @var Condition */
    private $condition;


    public function __construct(int $id, string $name, string $description, int $parentId, DisjointList $disjointList, DefinitionList $definitionList, Condition $condition)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->parentId = $parentId;
        $this->disjointList = $disjointList;
        $this->definitionList = $definitionList;
        $this->condition = $condition;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
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

    public function getDisjointList(): DisjointList
    {
        return $this->disjointList;
    }

    public function getDefinitionList(): DefinitionList
    {
        return $this->definitionList;
    }

    public function getCondition(): Condition
    {
        return $this->condition;
    }

}

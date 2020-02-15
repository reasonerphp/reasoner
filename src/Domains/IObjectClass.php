<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

interface IObjectClass
{

    public function getId(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getParentId(): int;

    public function getDisjointList(): DisjointList;

    public function getDefinitionList(): DefinitionList;

    public function getCondition(): Condition;

}

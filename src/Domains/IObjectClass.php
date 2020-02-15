<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

interface IObjectClass
{

    public function getId(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getParentId(): int;

    public function getDisjointList(): IDisjointList;

    public function getDefinitionList(): IDefinitionList;

    public function getCondition(): ICondition;

}

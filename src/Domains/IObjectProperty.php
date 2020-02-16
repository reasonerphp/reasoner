<?php

declare(strict_types = 1);

namespace Reasoner\Domains;

interface IObjectProperty
{

    public function getId(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getParentId(): int;

    public function isFunctional(): bool;

    public function getInversePropertyId(): int;

    public function isTransitive(): bool;

    public function getDomainSet(): IDomain;

    public function getRangeSet(): IRange;

}

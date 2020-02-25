<?php

declare(strict_types = 1);

namespace Reasoner\Reasoner\Factories;

use Reasoner\Domains\Definition;
use Reasoner\Domains\ObjectClass;
use Reasoner\Domains\Set;

class JsonFactory
{

    const CLASS_ID = 'classId';
    const CLASS_NAME = 'className';
    const CLASS_DESCRIPTION = 'classDescription';
    const PARENT_ID = 'superClassId';
    const CLASS_DISJOINTS = 'classDisjoints';
    const CLASS_DEFINITION = 'classDefinition';
    const CLASS_CONDITIONS = 'classConditions';
    const PROPERTY_ID = 'propertyId';
    const RESTRICTION_TYPE = 'restrictionType';
    const TYPE_SOME = 's';
    const TYPE_ONLY = 'o';
    const TYPE_MIN = 'n';
    const TYPE_MAX = 'x';
    const TYPE_EXACTLY = 'e';
    const COUNT = 'count';
    const SET = 'set';
    const OPERATOR = 'operator';
    const AND = 'and';
    const OR = 'or';
    const OPERATOR_LIST = [
        self::AND,
        self::OR,
    ];
    const IS_NEGATED = 'isNegated';
    const LIST = 'list';


    public function createObjectClass(\stdClass $data): ObjectClass
    {
        if (
            !property_exists($data, self::CLASS_ID)
            || !property_exists($data, self::CLASS_NAME)
            || !property_exists($data, self::CLASS_DESCRIPTION)
            || !property_exists($data, self::PARENT_ID)
            || !property_exists($data, self::CLASS_DISJOINTS)
        )
        {
            throw new \RuntimeException();
        }

        if (property_exists($data, self::CLASS_DEFINITION))
        {
            $definitionList = $this->createDefinitionList($data->{self::CLASS_DEFINITION});
        } else {
            $definitionList = $this->createDefinitionList([]);
        }

        if (property_exists($data, self::CLASS_CONDITIONS))
        {
            $conditionList = $this->createConditionList($data->{self::CLASS_CONDITIONS});
        } else {
            $conditionList = $this->createConditionList([]);
        }

        return new ObjectClass(
            $data->{self::CLASS_ID},
            $data->{self::CLASS_NAME},
            $data->{self::CLASS_DESCRIPTION},
            $data->{self::PARENT_ID},
            $this->createDisjointList($data->{self::CLASS_DISJOINTS}),
            $definitionList,
            $conditionList
        );
    }

    public function createDisjointList(array $data): DisjointList
    {
        $this->checkArray($data, self::CLASS_DISJOINTS);
        return new DisjointList($data);
    }

    public function createDefinitionList(array $data): DefinitionList
    {
        $list = [];

        foreach ($data as $object) {
            $list[] = $this->createDefinition($object);
        }

        return new DefinitionList($list);
    }

    public function createDefinition(\stdClass $data): IDefinition
    {
        if (
            !property_exists($data, self::PROPERTY_ID)
            || !property_exists($data, self::RESTRICTION_TYPE)
            || !property_exists($data, self::COUNT)
            || !property_exists($data, self::SET)
        )
        {
            throw new \RuntimeException();
        }

        switch ($data->{self::RESTRICTION_TYPE}) {
            case self::TYPE_SOME:
                return new Definition(
                    $data->{self::PROPERTY_ID},
                    1,
                    \null,
                    $this->createSet($data->{self::SET}));
                break;
            case self::TYPE_ONLY:
                return new Definition(
                    $data->{self::PROPERTY_ID},
                    2,
                    \null,
                    $this->createSet($data->{self::SET}));
                break;
            case self::TYPE_MAX:
                return new Definition(
                    $data->{self::PROPERTY_ID},
                    3,
                    $data->{self::COUNT},
                    \null);
                break;
            case self::TYPE_MIN:
                return new Definition(
                    $data->{self::PROPERTY_ID},
                    4,
                    $data->{self::COUNT},
                    \null);
                break;
            case self::TYPE_EXACTLY:
                return new Definition(
                    $data->{self::PROPERTY_ID},
                    5,
                    $data->{self::COUNT},
                    \null);
                break;
        }
    }

    public function createSet(\stdClass $data)
    {
        if (
            !property_exists($data, self::OPERATOR)
            || !property_exists($data, self::IS_NEGATED)
            || !property_exists($data, self::LIST)
            || !in_array($data->{self::OPERATOR}, self::OPERATOR_LIST)
            || !is_bool($data->{self::IS_NEGATED})
        )
        {
            throw new \RuntimeException();
        }

        $this->checkArray($data->{self::LIST}, self::LIST);
        return new Set(
            $data->{self::LIST},
            $data->{self::OPERATOR} === self::AND,
            $data->{self::IS_NEGATED});
    }

    private function prepareSet(array $data)
    {
        foreach ($data as $k => $v) {
            if ($v instanceof \stdClass)
            {
                $data[$k] = $this->createSet($v);
            } elseif (!is_int($v)) {
                throw new \RuntimeException();
            }
        }
    }

    public function createConditionList(array $data): ConditionList
    {
        return new ConditionList($data);
    }

    public function createCondition(\stdClass $object): Condition
    {
    }

    private function checkArray(array $data, string $name)
    {
        foreach ($data as $v) {
            if (!is_int($v))
            {
                throw new \RuntimeException();
            }
        }
    }

}
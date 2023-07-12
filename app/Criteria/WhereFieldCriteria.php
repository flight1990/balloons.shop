<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WhereFieldCriteria.
 *
 * @package namespace App\Criteria;
 */
class WhereFieldCriteria implements CriteriaInterface
{
    protected string $field;
    protected string|int|null $value;
    protected string $operator;

    public function __construct(string $field, int|string|null $value, string $operator = '=')
    {
        $this->field = $field;
        $this->value = $value;
        $this->operator = $operator;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->field, $this->operator, $this->value);
    }
}

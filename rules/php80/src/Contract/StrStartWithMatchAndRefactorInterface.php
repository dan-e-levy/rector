<?php

declare(strict_types=1);

namespace Rector\Php80\Contract;

use PhpParser\Node;
use PhpParser\Node\Expr\BooleanNot;
use PhpParser\Node\Expr\FuncCall;
use Rector\Php80\ValueObject\StrStartsWith;

interface StrStartWithMatchAndRefactorInterface
{
    public function match(Node $binaryOp): ?StrStartsWith;

    /**
     * @return FuncCall|BooleanNot|null
     */
    public function refactorStrStartsWith(StrStartsWith $strStartsWith): ?Node;
}

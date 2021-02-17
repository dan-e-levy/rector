<?php

declare(strict_types=1);

namespace Rector\Nette\Contract;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Variable;
use Rector\Nette\ValueObject\ContentExprAndNeedleExpr;

interface WithFunctionToNetteUtilsStringsRectorInterface
{
    public function getMethodName(): string;

    public function matchContentAndNeedleOfSubstrOfVariableLength(
        Expr $node,
        Variable $variable
    ): ?ContentExprAndNeedleExpr;
}

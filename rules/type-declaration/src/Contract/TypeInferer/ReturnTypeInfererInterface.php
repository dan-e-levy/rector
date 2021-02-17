<?php

declare(strict_types=1);

namespace Rector\TypeDeclaration\Contract\TypeInferer;

use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Type\Type;

interface ReturnTypeInfererInterface extends PriorityAwareTypeInfererInterface
{
    public function inferFunctionLike(ClassMethod $functionLike): Type;
}

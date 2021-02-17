<?php

declare(strict_types=1);

namespace Rector\Php80\NodeResolver;

use PhpParser\Node\Param;

final class RequireOptionalParamResolver
{
    /**
     * @return Param[]
     */
    public function resolve(\PhpParser\Node\Stmt\ClassMethod $functionLike): array
    {
        $optionalParams = [];
        $requireParams = [];
        foreach ($functionLike->getParams() as $position => $param) {
            if ($param->default === null) {
                $requireParams[$position] = $param;
            } else {
                $optionalParams[$position] = $param;
            }
        }

        return $requireParams + $optionalParams;
    }
}

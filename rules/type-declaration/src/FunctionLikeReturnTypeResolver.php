<?php

declare(strict_types=1);

namespace Rector\TypeDeclaration;

use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;
use Rector\StaticTypeMapper\StaticTypeMapper;

final class FunctionLikeReturnTypeResolver
{
    /**
     * @var StaticTypeMapper
     */
    private $staticTypeMapper;

    public function __construct(StaticTypeMapper $staticTypeMapper)
    {
        $this->staticTypeMapper = $staticTypeMapper;
    }

    public function resolveFunctionLikeReturnTypeToPHPStanType(ClassMethod $functionLike): Type
    {
        $functionReturnType = $functionLike->getReturnType();
        if ($functionReturnType === null) {
            return new MixedType();
        }

        return $this->staticTypeMapper->mapPhpParserNodePHPStanType($functionReturnType);
    }
}

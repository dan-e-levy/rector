<?php

declare(strict_types=1);

namespace Rector\DeadDocBlock;

use PhpParser\Node\FunctionLike;
use Rector\AttributeAwarePhpDoc\Ast\PhpDoc\AttributeAwareReturnTagValueNode;
use Rector\NodeTypeResolver\PHPStan\TypeComparator;

final class DeadReturnTagValueNodeAnalyzer
{
    /**
     * @var TypeComparator
     */
    private $typeComparator;

    public function __construct(TypeComparator $typeComparator)
    {
        $this->typeComparator = $typeComparator;
    }

    public function isDead(AttributeAwareReturnTagValueNode $returnTagValueNode, FunctionLike $functionLike): bool
    {
        $returnType = $functionLike->getReturnType();
        if ($returnType === null) {
            return false;
        }

        if (! $this->typeComparator->arePhpParserAndPhpStanPhpDocTypesEqual($returnType, $returnTagValueNode->type,
            $functionLike
        )) {
            return false;
        }

        return $returnTagValueNode->description === '';
    }
}

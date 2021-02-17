<?php

declare(strict_types=1);

namespace Rector\TypeDeclaration\Contract\TypeInferer;

use PhpParser\Node;
use PHPStan\Type\Type;

interface PropertyTypeInfererInterface extends PriorityAwareTypeInfererInterface
{
    public function inferProperty(Node $property): Type;
}

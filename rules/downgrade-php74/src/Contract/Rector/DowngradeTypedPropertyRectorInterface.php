<?php

declare(strict_types=1);

namespace Rector\DowngradePhp74\Contract\Rector;

use PhpParser\Node;

interface DowngradeTypedPropertyRectorInterface
{
    public function shouldRemoveProperty(Node $property): bool;
}

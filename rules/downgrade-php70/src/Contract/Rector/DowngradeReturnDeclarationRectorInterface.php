<?php

declare(strict_types=1);

namespace Rector\DowngradePhp70\Contract\Rector;

use PhpParser\Node;

interface DowngradeReturnDeclarationRectorInterface
{
    public function shouldRemoveReturnDeclaration(Node $functionLike): bool;
}

<?php

declare(strict_types=1);

namespace Rector\Core\Logging;

use Rector\Core\Contract\Rector\RectorInterface;
use Rector\Core\Rector\AbstractTemporaryRector;

final class CurrentRectorProvider
{
    /**
     * @var RectorInterface|null
     */
    private $currentRector;

    public function changeCurrentRector(AbstractTemporaryRector $rector): void
    {
        $this->currentRector = $rector;
    }

    public function getCurrentRector(): ?RectorInterface
    {
        return $this->currentRector;
    }
}

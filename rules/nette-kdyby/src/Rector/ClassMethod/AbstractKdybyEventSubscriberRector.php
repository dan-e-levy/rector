<?php

declare(strict_types=1);

namespace Rector\NetteKdyby\Rector\ClassMethod;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassLike;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;

abstract class AbstractKdybyEventSubscriberRector extends AbstractRector
{
    protected function shouldSkipClassMethod(Node $classMethod): bool
    {
        $classLike = $classMethod->getAttribute(AttributeKey::CLASS_NODE);
        if (! $classLike instanceof ClassLike) {
            return true;
        }

        if (! $this->isObjectType($classLike, 'Kdyby\Events\Subscriber')) {
            return true;
        }

        return ! $this->isName($classMethod, 'getSubscribedEvents');
    }
}

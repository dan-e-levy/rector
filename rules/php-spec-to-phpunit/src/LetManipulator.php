<?php

declare(strict_types=1);

namespace Rector\PhpSpecToPHPUnit;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\NodeNameResolver\NodeNameResolver;

final class LetManipulator
{
    /**
     * @var BetterNodeFinder
     */
    private $betterNodeFinder;

    /**
     * @var NodeNameResolver
     */
    private $nodeNameResolver;

    public function __construct(BetterNodeFinder $betterNodeFinder, NodeNameResolver $nodeNameResolver)
    {
        $this->betterNodeFinder = $betterNodeFinder;
        $this->nodeNameResolver = $nodeNameResolver;
    }

    public function isLetNeededInClass(Node $class): bool
    {
        foreach ($class->getMethods() as $classMethod) {
            // new test
            if ($this->nodeNameResolver->isName($classMethod, 'test*')) {
                continue;
            }

            $hasBeConstructedThrough = (bool) $this->betterNodeFinder->find(
                (array) $classMethod->stmts,
                function (Node $node): ?bool {
                    if (! $node instanceof MethodCall) {
                        return null;
                    }

                    return $this->nodeNameResolver->isName($node->name, 'beConstructedThrough');
                }
            );

            if ($hasBeConstructedThrough) {
                continue;
            }

            return true;
        }

        return false;
    }
}

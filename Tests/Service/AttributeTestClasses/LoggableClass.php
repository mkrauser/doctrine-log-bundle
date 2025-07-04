<?php

namespace Mb\DoctrineLogBundle\Tests\Service\AttributeTestClasses;

use Mb\DoctrineLogBundle\Attribute\Exclude;
use Mb\DoctrineLogBundle\Attribute\Loggable;

#[Loggable(strategy: Loggable::STRATEGY_INCLUDE_ALL)]
class LoggableClass
{
    public bool $loggableProp;

    #[Exclude]
    public bool $nonLoggableProp;
}
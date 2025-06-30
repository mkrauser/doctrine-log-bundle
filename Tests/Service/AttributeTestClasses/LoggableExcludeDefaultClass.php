<?php

namespace Mb\DoctrineLogBundle\Tests\Service\AttributeTestClasses;

use Mb\DoctrineLogBundle\Attribute\Log;
use Mb\DoctrineLogBundle\Attribute\Loggable;

#[Loggable(strategy: Loggable::STRATEGY_EXCLUDE_ALL)]
class LoggableExcludeDefaultClass
{

    #[Log]
    public bool $loggableProp;

    public bool $nonLoggableProp;
}
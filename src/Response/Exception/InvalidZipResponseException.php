<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response\Exception;

/**
 * This exception is thrown if an invalid ZIP response is
 * detected, i.e., when a ZIP Response does not contain
 * its CSV counterpart.
 */
class InvalidZipResponseException extends \RuntimeException
{
}

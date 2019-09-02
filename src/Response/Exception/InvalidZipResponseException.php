<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response\Exception;

/**
 * This exception is thrown if an invalid Zip response is
 * detected, i. e. when a Zip Response doesn't contain
 * its CSV counterpart.
 */
class InvalidZipResponseException extends \RuntimeException
{
}

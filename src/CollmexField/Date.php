<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\CollmexField;

use DateTime;
use DateTimeZone;
use InvalidArgumentException;

class Date
{
    /**
     * Converts DateTime instance to Collmex date format.
     */
    public static function fromDateTime(DateTime $dateTime): string
    {
        return $dateTime->format('Ymd');
    }

    /**
     * Converts Collmex date format to \DateTime
     *
     * @see https://www.collmex.de/c.cmx?1005,1,help,daten_importieren_datentypen_felder
     *
     * @throws InvalidArgumentException
     */
    public static function toDateTime(string $value, ?DateTimeZone $timeZone = null): DateTime
    {
        if ($timeZone === null) {
            // Europe/Berlin is probably a sane choice here as Collmex targets german customers ...
            $timeZone = new DateTimeZone('Europe/Berlin');
        }

        // ISO format YYYYMMDD
        if (preg_match('/^(\d{8})$/', $value) === 1) {
            try {
                return new DateTime(
                    substr($value, 0, 4) . '-'
                    . substr($value, 4, 2) . '-'
                    . substr($value, 6),
                    $timeZone
                );
            } catch (\Exception $exception) {
                throw new InvalidArgumentException(
                    'Cannot create DateTime object - invalid date string: ' . $value,
                    3_667_838_412,
                    $exception
                );
            }
        }

        // German format DD.MM.YYYY
        if (preg_match('/^(\d{2}\.\d{2}\.\d{4})$/', $value) === 1) {
            try {
                return new DateTime(
                    substr($value, 6) . '-'
                    . substr($value, 3, 2) . '-'
                    . substr($value, 0, 2),
                    $timeZone
                );
            } catch (\Exception $exception) {
                throw new InvalidArgumentException(
                    'Cannot create DateTime object - invalid date string: ' . $value,
                    2_033_421_948,
                    $exception
                );
            }
        }

        throw new InvalidArgumentException('Invalid date value: ' . $value, 3_746_303_620);
    }
}

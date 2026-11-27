<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use InvalidArgumentException;

/**
 * Converts UTF-8 to Windows-1252 with transliteration.
 *
 * Uses iconv with //TRANSLIT to approximate characters that don't exist
 * in Windows-1252 (e.g. ā → a, ø → o, ł → l) instead of garbling them.
 *
 * Useful when sending data to Collmex without the UTF-8 LOGIN flag,
 * or when Collmex's own UTF-8 → ISO-8859-1 conversion (which replaces
 * non-representable characters with "?") is not acceptable.
 */
class Utf8ToWindows1252Translit extends AbstractFilter
{
    /**
     * @throws InvalidArgumentException
     */
    #[\Override]
    public function filterString(string $text): string
    {
        $result = iconv('UTF-8', 'Windows-1252//TRANSLIT', $text);

        if ($result === false) {
            // Fallback: drop unconvertible characters rather than failing
            $result = iconv('UTF-8', 'Windows-1252//IGNORE', $text);
        }

        if ($result === false) {
            throw new InvalidArgumentException(
                'Cannot convert string to Windows-1252',
                2_132_076_005
            );
        }

        return $result;
    }
}

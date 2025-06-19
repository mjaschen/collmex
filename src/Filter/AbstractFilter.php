<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

abstract class AbstractFilter implements FilterInterface
{
    #[\Override]
    public function filterArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->filterArray($value);
                continue;
            }
            $data[$key] = $this->filterString($value);
        }

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

use JsonSerializable;
use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException;

/**
 * Abstract Collmex Type Class.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
abstract class AbstractType implements JsonSerializable
{
    /**
     * All data fields for the type, ordered.
     *
     * @var array
     */
    protected $template;

    /**
     * The type data fields (ordered).
     *
     * @var array
     */
    protected $data;

    /**
     * @var bool[]|null
     */
    protected $validationErrors;

    /**
     * @var SimpleGenerator
     */
    protected $csvGenerator;

    /**
     * @param array $data type data
     *
     * @throws InvalidFieldNameException
     */
    public function __construct(array $data)
    {
        $this->csvGenerator = new SimpleGenerator();

        $this->populateData($data);
    }

    /**
     * Builds the CSV representation of the Collmex type.
     *
     * @return string CSV lines
     */
    public function getCsv(): string
    {
        return $this->csvGenerator->generate([$this->data]);
    }

    /**
     * Returns the complete data array.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->toJson();
    }

    /**
     * Returns the complete data as JSON.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->data);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->data;
    }

    /**
     * Read record field.
     *
     * @param string $name The field name
     *
     * @return mixed
     *
     * @throws InvalidFieldNameException
     */
    public function __get(string $name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        throw new InvalidFieldNameException(
            'Cannot read field value; field "' . $name . '" does not exist in class ' . get_class($this)
        );
    }

    /**
     * @param string $name The field name
     * @param mixed $value The new field value
     *
     * @return void
     *
     * @throws InvalidFieldNameException
     */
    public function __set(string $name, $value): void
    {
        if ($name === 'type_identifier') {
            throw new InvalidFieldNameException('Cannot overwrite type identifier');
        }

        if (array_key_exists($name, $this->template)) {
            $this->data[$name] = $value;

            return;
        }

        throw new InvalidFieldNameException(
            'Cannot set field value; field "' . $name . '" does not exist in class ' . get_class($this)
        );
    }

    /**
     * @param string $name The field name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }

    /**
     * Populates the $data attribute with the given array.
     *
     * @param array $data if the array is indexed by numeric keys (first key
     * is checked), we'll merge the data by index order.
     *
     * @return void
     *
     * @throws InvalidFieldNameException
     */
    protected function populateData(array $data): void
    {
        if (!isset($data[0])) {
            $this->assertValidFieldNames($data);
            $this->data = array_merge($this->template, $data);

            return;
        }

        $index = 0;

        foreach ($this->template as $key => $value) {
            if (isset($data[$index])) {
                $this->data[$key] = $data[$index];
            }
            $index++;
        }
    }

    /**
     * Checks if all provided field names are valid: each given field name
     * must exist in $this->template.
     *
     * @param array $data
     *
     * @return void
     *
     * @throws InvalidFieldNameException
     */
    private function assertValidFieldNames(array $data): void
    {
        $fieldNamesDiff = array_diff_key($data, $this->template);

        if (count($fieldNamesDiff) !== 0) {
            throw new InvalidFieldNameException(
                'Cannot populate data: invalid field name(s) detected: ' . implode(', ', array_keys($fieldNamesDiff))
            );
        }
    }
}

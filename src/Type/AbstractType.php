<?php
/**
 * Abstract Collmex Type Class
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

use MarcusJaschen\Collmex\Csv\GeneratorInterface;
use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException;

/**
 * Abstract Collmex Type Class
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
abstract class AbstractType
{
    /**
     * All data fields for the type, ordered.
     *
     * @var array
     */
    protected $template;

    /**
     * The type data fields (ordered)
     *
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $validationErrors;

    /**
     * @var GeneratorInterface
     */
    protected $csvGenerator;

    /**
     * @param array $data type data
     * @param \MarcusJaschen\Collmex\Csv\GeneratorInterface $generator This
     * argument is optional, the SimpleGenerator is used if argument is
     * omitted
     */
    public function __construct($data, GeneratorInterface $generator = null)
    {
        $this->populateData($data);

        if (is_null($generator)) {
            $this->csvGenerator = new SimpleGenerator();
        }
    }

    /**
     * @param GeneratorInterface $generator
     */
    public function setCsvGenerator(GeneratorInterface $generator)
    {
        $this->csvGenerator = $generator;
    }

    /**
     * Builds the CSV representation of the Collmex type.
     *
     * @return array of CSV lines
     */
    public function getCsv()
    {
        return $this->csvGenerator->generate([$this->data]);
    }

    /**
     * Returns the complete data array
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Returns the complete data as JSON
     *
     * @return string
     */
    public function getJSON()
    {
        return json_encode($this->data);
    }

    /**
     * Read record field
     *
     * @param string $name The field name
     *
     * @throws \MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        throw new InvalidFieldNameException("Cannot read field value; field '{$name}' does not exist in class " . get_class($this));
    }

    /**
     * @param string $name The field name
     * @param mixed $value The new field value
     *
     * @throws \MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException
     */
    public function __set($name, $value)
    {
        if ($name == 'type_identifier') {
            throw new InvalidFieldNameException("Cannot overwrite type identifier");
        }

        if (array_key_exists($name, $this->template)) {
            $this->data[$name] = $value;

            return;
        }

        throw new InvalidFieldNameException("Cannot set field value; field '{$name}' does not exist in class " . get_class($this));
    }

    /**
     * @param string $name The field name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * Populates the $data attribute with the given array
     *
     * @param array $data if the array is indexed by numeric keys (first key
     * is checked), we'll merge the data by index order.
     */
    protected function populateData($data)
    {
        if (! isset($data[0])) {
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
}

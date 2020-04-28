<?php
/**
 * class that will work as data holder. Will give information about pixel
 */

namespace App\Pixels;


use Exception;

class Pixel
{
    /**
     * @var array pixel array
     */
    private $data = [];

//pagal šį masyvą kviesim set'erius setData metode ir get'erius getData metode
    private $properties = [
    ];

    /**
     * Pixel constructor.
     * @param array|null $data
     * @throws Exception
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            //sukuri pixelius prieš įrašant/panaudojant duomenis iš/į duombazę
            $this->data = [];
            $this->setData($data);
        }
    }

    /**
     * Sets x if its int
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->data['x'] = $x;
    }

    /**
     * Returns set x
     * @return int
     */
    public function getX(): ?int
    {
        return $this->data['x'] ?? null;
    }

    /**
     * Sets y if its int
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->data['y'] = $y;
    }

    /**
     * Returns set y
     * @return int
     */
    public function getY(): ?int
    {
        return $this->data['y'] ?? null;
    }

    /**
     * Sets color if $color is hex
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->data['color'] = $color;
    }

    /**
     * Returns set color
     * @return string
     */
    public function getColor(): ?string
    {
        return $this->data['color'] ?? null;
    }

    /**
     * Sets email if right format
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->data['email'] = $email;
    }

    /**
     * Returns set email
     * @return string
     * @throws Exception
     */
    public function getEmail(): ?string
    {
        return $this->data['email'] ?? null;
    }

    /**
     * @param array $data
     * @throws Exception
     */
    public function setData(array $data): void
    {
        foreach ($this->properties as $property) {
            if (isset($data[$property])) {
                $method = 'set' . str_replace('_', '', $property);
                $this->{$method}($data[$property]);
            }
        }
    }

    /**
     *calls all getters and returns value array
     * @return array
     * @throws Exception
     */
    public function getData(): array
    {
        $results = [];
        foreach ($this->properties as $property) {
            $method = 'get' . str_replace('_', '', $property);
            return $this->{$method}[$property];
        }
        return $results;
    }

    /**
     * Calls out when property is set to some value.
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value): void
    {
        if($method = $this->getSetterMethod($property_key)){
            $this->{$method}($value);
        }
    }

    /**
     *  Calls out when object property is given only
     * @param $property_key
     * @return mixed
     */
    public function __get($property_key)
    {
        if($method = $this->getGetterMethod($property_key)){
            return $this->{$method}();
        }
    }


    private function getSetterMethod($property_key): ?string
    {
        $method = $this->keyToMethod('get', $property_key);
        if (method_exists($this, $method)){
            return $method;
    }
    }

    private function getGetterMethod($property_key): ?string
    {
        $method = $this->keyToMethod('set', $property_key);
        if (method_exists($this, $method)){
            return $method;
    }
    }

    private function keyToMethod($prefix, $property_key){
        return $prefix . str_replace('_', '', $property_key);
    }

}

$test = new Pixel();
$test->x = 200;


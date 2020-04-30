<?php
/**
 * class that will work as data holder. Will give information about pixel
 */

namespace App\Pixels;

class Pixel
{
//
    private $data = [];
    private $properties = [
        'x',
        'y',
        'color',
        'email'
    ];


    /**
     * Sets x if its int
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->'x' = $x;
    }

    /**
     * Returns set x
     * @return int
     */
    public function getX(): ?int
    {
        return $this->'x' ?? null;
    }

    /**
     * Sets y if its int
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->'y' = $y;
    }

    /**
     * Returns set y
     * @return int
     */
    public function getY(): ?int
    {
        return $this->'y' ?? null;
    }

    /**
     * Sets color if $color is hex
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->'color'= $color;
    }

    /**
     * Returns set color
     * @return string
     */
    public function getColor(): ?string
    {
        return $this->'color' ?? null;
    }

    /**
     * Sets email if right format
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->'email'= $email;
    }

    /**
     * Returns set email
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->'email' ?? null;
    }

    /**
     *nustato properties iš masyvo
     * @param array $data
     */
    public function _setData(array $data): void
    {
//        $data=[
//          'x'=>100
//        ];
        //per kiekviena data masyve esantį index ir value eina ciklas, iesko set metodų pagal
        //property key , ir if $method egzistuoja, tai iškviečia
        foreach ($data as $property_key => $value) {
            //$property_key= x
            //$value = 100
            $method= $this->_getSetterMethod($property_key);
            //$method = setX (string)
            if ($method) {
                //metodo iškvietimas
                $this->{$method}($value);
                //$this->setX($value);
                //$value = 100
            }
        }
//        var_dump($data['z']);
//        var_dump($data[100]);
    }

    /**
     *calls all getters and returns value array
     * @return array
     */
    public function _getData(): array
    {
        $results = [];
        foreach ($this->properties as $property) {
            $method = 'get' . str_replace('_', '', $property);
            $method = $this->_getPropertyKeys();
            return $this->{$method}[$property];
        }
        return $results;
    }

    /**
     * Pixel constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
//            //sukuri pixelius prieš įrašant/panaudojant duomenis iš/į duombazę
//            $this->data = [];
            $this->_setData($data);
        }
    }

    /**
     * Calls out when property is set to some value.Automatiškai gražina seteri pgal property key(patikrina ar toks egzistuoja)
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value)
    {
        if ($method = $this->_getSetterMethod($property_key)) {
            $this->{$method}($value);
        }
    }

    /**
     *  Calls out when object property is given only. Grąžina geterį pagal property key (patikrina ar toks egzistuoja)
     * @param $property_key
     * @return mixed
     */
    public function __get($property_key)
    {
        if ($method = $this->_getGetterMethod($property_key)) {
            return $this->{$method}();
        }
    }

    /**
     * Checks if setter method exists
     * @param $key
     * @return string|null
     */
    private function _getSetterMethod($key): ?string
    {
        $method = $this->_keyToMethod('set', $key);
        if (method_exists($this, $method)) {
            return $method;
        }
        return false;
    }

    /**
     * Grąžina get metodo pavadinimą pagal property key(patikrina ar metodas egzistuoja)
     * @param $key
     * @return string|null
     */
    private function _getGetterMethod($key): ?string
    {
        $method = $this->_keyToMethod('get', $key);
        if (method_exists($this, $method)) {
            return $method;
        }
    }

    /**
     * Generates method name from property name
     * @param $prefix
     * @param $property_key
     * @return string
     */
    private function _keyToMethod($prefix, $property_key)
    {
        return $prefix . str_replace('_', '', $property_key);
    }

    /**
     * Generates key name from method name
     * @param string $prefix
     * @param string $method
     * @return string|string[]|null
     */
    private function _methodToKey(string $prefix, string $method): string
    {
        $s_case = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $method));

        return ltrim($s_case, $prefix . '_');
    }

    /**
     * Return array with all property keys that belongs to getter's.
     * F-ija kuri atiduoda masyva kuriame yra visi  properciu raktai kuriuos
     * galima nustatyti su aprasytais geteriais
     * @return array
     */
    private function _getPropertyKeys():array
    {
        $keys = [];
        $class_methods = get_class_methods($this);
        foreach ($class_methods as $method) {
            if (preg_match('/^get/', $method)) {
                $keys[] = $this->_methodToKey('get', $method);
            }
            var_dump($method);
        }
        return($keys);
    }

}



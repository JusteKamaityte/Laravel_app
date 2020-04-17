<?php
/**
 * Class for getting and saving data to/from file
 */
class FileDB
{
    /** @var string File location */
    private $file_name;
    /** @var array Information to be saved */
    private $data;

    /**
     * FileDB constructor.
     * @param string $file_name
     */
    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * Sets current database data
     * (doesnt save)
     * @param $data_array
     */
    public function setData(array $data_array): void
    {
        $this->data = $data_array;
    }

    /**
     * Writes data to file
     * @return bool
     */
    public function save(): bool
    {
        $bytes_written = file_put_contents($this->file_name, json_encode($this->data));
        if ($bytes_written !== false) {
            return true;
        }
        return false;
    }

    /**
     * Get data from file
     * overwrites $data
     */
    public function load(): void
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);
            $this->data = $data !== false ? json_decode($data, true) : false;
        } else {
            $this->data = [];
        }
    }

    /**
     * Returns current $data
     * @return array
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * Funkcija $table_name indeksu sukuria tuščią masyvą
     * @param $table_name
     * @return void
     */
    public function createTable($table_name)
    {
        if(!$this->tableExists($table_name)){
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * Funkcija tikrina ar toks table jau egzistuoja
     * @param $table_name
     * @return bool
     */
    public function tableExists($table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        }
        return false;
    }

    /**
     * Funkcija ištrina nurodytą table kartu su indeksu
     * @param $table_name
     */
    public function dropTable($table_name){
       unset($this->data[$table_name]);
    }

    /**
     * Funkcija kuri išvalo visą turinį nurodytoje lenteleje
     * @param $table_name
     * @return bool
     */
    public function truncateTable($table_name){
        if($this->tableExists($table_name)){
           $this->data[$table_name] = [];
           return true;
        }
        return false;
    }

    /**
     * Funkcija įrašo eilutės masyvą į table
     * @param $table_name
     * @param $row
     * @param null $row_id
     * @return bool|null
     */
    public function insertRow($table_name, $row, $row_id=null){
        $this->data[$table_name]=$this->data[$table_name][$row];
        if(!isset($table_name[$row][$row_id])){
            $this->data[$table_name][$row][$row_id]++;
            return $row_id;
        }else if($row_id){
           return false;
        }
    }
}



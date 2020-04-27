<?php
namespace Core\Databases;
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
     * @return bool
     */
    public function createTable($table_name)
    {
        if (!$this->tableExists($table_name)) {
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
    public function dropTable($table_name)
    {
        unset($this->data[$table_name]);
    }

    /**
     * Funkcija kuri išvalo visą turinį nurodytoje lenteleje
     * @param $table_name
     * @return bool
     */
    public function truncateTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * F-ija pridedanti viena eilute su automatiniu indeksu arba musu parasytu
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool|mixed|null
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id == null) {
            $this->data[$table_name][] = $row;
            return array_key_last($this->data[$table_name]);
        } elseif (!$this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return $row_id;
        }
        return false;
    }
    /**
     * Patikrina ar eilute egzistuoja
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }
        return false;
    }


    /**
     * Perrašo table esantį row_id indeksu eilutės masyvą į row
     * @param $table_name
     * @param $row_id
     * @param $row
     * @return bool
     */
    public function updateRow(string $table_name,array $row, $row_id): bool
    {

        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }
        return false;
    }

    /**
     * ištrina eilutę, jei tokia egzistuoja
     * @param $table_name
     * @param $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, $row_id): bool
    {

        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        } else {
            return false;
        }

    }

    /**
     * Function returns row according to row_id, reik pataisyt
     * @param $table_name
     * @param $row_id
     * @return mixed
     */
    public function getRowById(string $table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id];
            return true;
        }
        return false;
    }


    /**
     * Returns a row array that meets the specified conditions
     * @param string $table_name
     * @param array $conditions
     * @return mixed
     */
    public function getRowsWhere(string $table_name, array $conditions = [])
    {
        $result = [];
        foreach ($this->data[$table_name] as $row_id => $row) {
            $match = true;
            foreach ($conditions as $search_key => $search_value) {
                if(!isset($row[$search_key]) || $row[$search_key] !=$search_value){
                    $match = false;
                }
            }
            if($match){
                $result[$row_id] = $row;
            }
        }
        return $result;
    }


    /**
     * Returns one row that meets specified conditions
     * @param $table_name
     * @param $conditions
     * @return mixed
     */
    public function getRowWhere($table_name, $conditions){
        $rows= $this->getRowsWhere($table_name, $conditions);
        return reset($rows);
    }
}




<?php

namespace App\Pixels;
use App\App;
use Core\DataHolder;

class Model {

        const TABLE = 'pixels';

        /**
         * @param Pixel $pixel
         */
        public static function insert(Pixel $pixel){

            App::$db->insertRow(self::TABLE, $pixel->_getData());
        }

    /**
     * @param $conditions
     * @return array
     */
        public static function getWhere($conditions){
            $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
            $pixels= [];

            foreach($rows as $row){
                $pixels = new Pixel($row);
            }
            return $pixels;
    }

    /**
     * @param Pixel $pixel
     */
    public static function update(Pixel $pixel){
        App::$db->updateRow(self::TABLE, $pixel->_getData(), $pixel->getId());
    }

    /**
     * @param Pixel $pixel
     */
    public static function delete(Pixel $pixel){
        App::$db->deleteRow(self::TABLE, $pixel->getId());
    }
}

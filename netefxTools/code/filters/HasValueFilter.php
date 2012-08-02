<?php
/**
 * Selects content that has a value OR on the other Hand is NULL or ''
 * @version 0.2 (2012-08-02)
 * 
 * @package netefxTools
 * @subpackage filters* 
 * 
 * @example $DescriptionField = new DropdownField ('HasDescrition',  'Has a descrition', array("" => "all", TRUE => "yes", FALSE => "no"));     
 */
class HasValueFilter extends SearchFilter {
    
    public function apply(DataQuery $query) {
        $this->model = $query->applyRelation($this->relation);
        $where = array();
        
        if(is_array($this->getValue())) {
            foreach($this->getValue() as $value) {
                $value = Convert::raw2sql($value);
                if ($value) {
                    $where[] = sprintf("%s IS NOT NULL AND %s <> ''", $this->getDbName(), $this->getDbName());    
                }
                else {
                    $where[] = sprintf("%s IS NULL OR %s = ''", $this->getDbName(), $this->getDbName());   
                }
            }

        } else {
            $value = Convert::raw2sql($this->getValue()); 
            if ($value) {
                $where[] = sprintf("%s IS NOT NULL AND %s <> ''", $this->getDbName(), $this->getDbName());
            }
            else {
                $where[] = sprintf("%s IS NULL OR %s = ''", $this->getDbName(), $this->getDbName());    
            }
        }

        return $query->where(implode(' OR ', $where));
    }
    
    public function isEmpty() {
        return $this->getValue() == null || $this->getValue() == '';
    }
}
<?php 

namespace App\Libraries\Extensions\FormBuilder;

use Collective\Html\FormBuilder as CollectiveFormBuilder;

class FormBuilder extends CollectiveFormBuilder {

    public function selectOpt($name, $collection, $groupBy = 'parent_name', $labelBy = 'name', $valueBy = 'id', $attributes = array()) {
      
      $select_optgroup_arr = array();
      foreach ($collection as $item)
      {

        $select_optgroup_arr[$item->$groupBy][$item->$valueBy] = $item->$labelBy;
      }

      return $this->select($name, $select_optgroup_arr, null, $attributes);
    }

}
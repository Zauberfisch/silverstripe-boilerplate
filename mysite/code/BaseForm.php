<?php

class BaseForm extends Form {
	public function fieldLabels() {
		return array();
	}

	public function fieldLabel($name) {
		$labels = $this->fieldLabels();
		return (isset($labels[$name])) ? $labels[$name] : FormField::name_to_label($name);
	}

	public function __construct($controller, $name, FieldList $fields, FieldList $actions, $validator = null) {
		parent::__construct($controller, $name, $fields, $actions, $validator);
		foreach ($fields as $field) {
			$this->processField($field);
		}
	}

	protected function processField(FormField $field) {
		if ($field->is_a('CompositeField')) {
			foreach ($field->getChildren() as $child) {
				$this->processField($child);
			}
		} elseif ($field->is_a('TextField')) {
			$field->setAttribute('placeholder', $field->attrTitle());
		}
	}
}

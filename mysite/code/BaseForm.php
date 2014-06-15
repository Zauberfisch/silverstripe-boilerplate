<?php

/**
 * Base Form to provide additional functionality like auto placeholder setting and fieldLabel()
 */
class BaseForm extends Form {
	private static $set_placeholder = true;
	private static $set_placeholder_required_star = true;

	/**
	 * @param Controller $controller
	 * @param String $name
	 * @param FieldList $fields
	 * @param FieldList $actions
	 * @param null $validator
	 */
	public function __construct($controller, $name, FieldList $fields, FieldList $actions, $validator = null) {
		parent::__construct($controller, $name, $fields, $actions, $validator);
		$this->processFields(
			$fields,
			$validator,
			Config::inst()->get($this->class, 'set_placeholder'),
			Config::inst()->get($this->class, 'set_placeholder_required_star')
		);
		$this->addExtraClass('base-form');
	}

	/**
	 * @param FieldList $fields
	 * @param RequiredFields $r
	 * @param bool $setPlaceholder
	 * @param bool $setRequiredPlaceholder
	 * @return static
	 */
	protected function processFields(FieldList $fields, RequiredFields $r = null, $setPlaceholder = true, $setRequiredPlaceholder = true) {
		if ($setPlaceholder) {
			foreach ($fields as $f) {
				if ($f->is_a('CompositeField')) {
					$this->processFields($f->FieldList(), $r, $setPlaceholder, $setRequiredPlaceholder);
				} elseif ($f->is_a('ConfirmedPasswordField')) {
					$this->processFields($f->getChildren(), $r, $setPlaceholder, $setRequiredPlaceholder);
				} elseif ($setPlaceholder && ($f->is_a('TextField') || $f->is_a('TextAreaField'))) {
					$surfix = $r && $r->fieldIsRequired($f->getName()) && $setRequiredPlaceholder ? ' *' : '';
					$this->setPlaceHolder($f, $surfix);
				}
			}
		}
		return $this;
	}

	/**
	 * @param FormField $f
	 * @param string $surfix
	 * @return static
	 */
	protected function setPlaceHolder(FormField $f, $surfix = '') {
		$str = $f->Title();
		if ($surfix) {
			$str .= " $surfix";
		}
		$f->setAttribute('placeholder', $str);
		return $this;
	}


	/**
	 * Get a human-readable label for a single field,
	 * see {@link fieldLabels()} for more details.
	 *
	 * @uses fieldLabels()
	 * @uses FormField::name_to_label()
	 *
	 * @param string $name Name of the field
	 * @return string Label of the field
	 */
	public function fieldLabel($name) {
		$labels = $this->fieldLabels();
		return (isset($labels[$name])) ? $labels[$name] : FormField::name_to_label($name);
	}

	/**
	 * @return array
	 */
	public function fieldLabels() {
		return array();
	}
}
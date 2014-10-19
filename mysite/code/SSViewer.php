<?php

namespace mysite;

class SSViewer extends \SSViewer {
	public static function get_templates_by_class($className, $suffix = '', $baseClass = null) {
		// Figure out the class name from the supplied context.
		if (!is_string($className) || !class_exists($className)) {
			throw new \InvalidArgumentException('SSViewer::get_templates_by_class() expects a valid class name as ' .
				'its first parameter.');
		}
		$templates = array();
		$classes = array_reverse(\ClassInfo::ancestry($className));
		foreach ($classes as $class) {
			$classTemplates = array();
			if (strpos($class, '\\') !== false) {
				// replace \ with - to avoid having to use \ in filenames, this is the preferred filename
				$classTemplates[] = str_replace('\\', '-', $class);
				// for legacy reasons include the normal classname as well, the filename will contain a \
				// which is a valid filename on *nix systems
				$classTemplates[] = $class;
				// add file name without namespace as fallback. eg mynamespace/MyPage becomes MyPage
				$classParts = explode('\\', $class);
				$classTemplates[] = $classParts[count($classParts) - 1];
			} else {
				// class without namespace
				$classTemplates[] = $class;
			}
			foreach ($classTemplates as $classTemplate) {
				$template = $classTemplate . $suffix;
				if (true || SSViewer::hasTemplate($template)) {
					$templates[] = $template;
				}
			}
			if ($baseClass && $class == $baseClass) {
				break;
			}
		}
		return $templates;
	}
}
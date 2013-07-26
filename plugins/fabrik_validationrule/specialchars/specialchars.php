<?php
/**
 * Special Characters Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.specialchars
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

/**
 * Special Characters Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.specialchars
 * @since       3.0
 */

class PlgFabrik_ValidationruleSpecialChars extends PlgFabrik_Validationrule
{

	/**
	 * Plugin name
	 *
	 * @var string
	 */
	protected $pluginName = 'specialchars';

	/**
	 * Validate the elements data against the rule
	 *
	 * @param   string  $data           To check
	 * @param   int     $repeatCounter  Repeat group counter
	 *
	 * @return  bool  true if validation passes, false if fails
	 */

	public function validate($data, $repeatCounter)
	{
		// For multiselect elements
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$domatch = $params->get('specialchars-match');
		if ($domatch)
		{
			$v = $params->get('specalchars');
			$v = explode(',', $v);
			foreach ($v as $c)
			{
				if (strstr($data, $c))
				{
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * Checks if the validation should replace the submitted element data
	 * if so then the replaced data is returned otherwise original data returned
	 *
	 * @param   string  $data           Original data
	 * @param   int     $repeatCounter  Repeat group counter
	 *
	 * @return  string	original or replaced data
	 */

	public function replace($data, $repeatCounter)
	{
		$params = $this->getParams();
		$domatch = $params->get('specialchars-match');
		if (!$domatch)
		{
			$v = $params->get($this->pluginName . '-expression');
			$replace = $params->get('specialchars-replacestring');
			if ($replace === '_default')
			{
				$replace = '';
			}
			$v = $params->get('specalchars');
			$v = explode(',', $v);
			foreach ($v as $c)
			{
				$data = str_replace($c, $replace, $data);
			}
		}
		return $data;
	}
}

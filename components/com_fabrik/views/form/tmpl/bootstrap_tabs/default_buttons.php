<?php
/**
 * Bootstrap Tabs Form Template - buttons
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       3.1
 */
 ?>
<?php if ($this->showEmail): ?>
	<a class="btn" href="<?php echo $this->emailURL?>">
		<i class="icon-envelope"></i>
		<?php echo JText::_('JGLOBAL_EMAIL'); ?>
	</a>
<?php endif;

if ($this->showPDF):?>
	<a class="btn" href="<?php echo $this->pdfURL?>">
		<i class="icon-file"></i>
		<?php echo JText::_('COM_FABRIK_PDF')?>
	</a>
<?php endif;

if ($this->showPrint):?>
	<a class="btn" href="<?php echo $this->printURL?>">
		<i class="icon-print"></i>
		<?php echo JText::_('JGLOBAL_PRINT')?>
	</a>
<?php
endif;

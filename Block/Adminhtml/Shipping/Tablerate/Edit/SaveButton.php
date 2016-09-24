<?php 
/**
 * A Magento 2 module named Experius/TableRateManager
 * Copyright (C) 2016 Derrick Heesbeen
 * 
 * This file included in Experius/TableRateManager is licensed under OSL 3.0
 * 
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Experius\TableRateManager\Block\Adminhtml\Shipping\Tablerate\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface; 
 
class SaveButton extends GenericButton implements ButtonProviderInterface {


	
	public function getButtonData(){
		return [
		    'label' => __('Save Shipping Tablerate'),
		    'class' => 'save primary',
		    'data_attribute' => [
		        'mage-init' => ['button' => ['event' => 'save']],
		        'form-role' => 'save',
		    ],
		    'sort_order' => 90,
		];
	}
}

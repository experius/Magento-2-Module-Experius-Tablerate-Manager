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
 
class BackButton extends GenericButton implements ButtonProviderInterface {


	
	public function getButtonData(){
		return [
		    'label' => __('Back'),
		    'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
		    'class' => 'back',
		    'sort_order' => 10
		];
	}

	
	public function getBackUrl(){
		return $this->getUrl('*/*/');
	}
}

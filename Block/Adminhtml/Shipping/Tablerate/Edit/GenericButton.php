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

use Magento\Backend\Block\Widget\Context; 
 
abstract class GenericButton {

	protected $context;

	
	public function __construct(Context $context){
		$this->context = $context;
	}

	
	public function getModelId(){
		return $this->context->getRequest()->getParam('pk');
	}

	
	public function getUrl($route = '', $params = []){
		return $this->context->getUrlBuilder()->getUrl($route, $params);
	}
}

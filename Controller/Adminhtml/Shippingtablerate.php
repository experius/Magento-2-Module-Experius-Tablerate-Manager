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

namespace Experius\TableRateManager\Controller\Adminhtml;
 
 
abstract class Shippingtablerate extends \Magento\Backend\App\Action {

	const ADMIN_RESOURCE = 'Experius_TableRateManager::top_level';
	protected $_coreRegistry;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Registry $coreRegistry
	){
		$this->_coreRegistry = $coreRegistry;
		parent::__construct($context);
	}

	
	public function initPage($resultPage){
		$resultPage->setActiveMenu('Experius_Test::top_level')
		    ->addBreadcrumb(__('Experius'), __('Experius'))
		    ->addBreadcrumb(__('Shipping Tablerate'), __('Shipping Tablerate'));
		return $resultPage;
	}
}

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

namespace Experius\TableRateManager\Controller\Adminhtml\Shippingtablerate;
 
 
class NewAction extends \Experius\TableRateManager\Controller\Adminhtml\Shippingtablerate {

	protected $resultForwardFactory;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
	){
		$this->resultForwardFactory = $resultForwardFactory;
		parent::__construct($context, $coreRegistry);
	}

	
	public function execute(){
		/** @var \Magento\Framework\Controller\Result\Forward $resultForward */
		$resultForward = $this->resultForwardFactory->create();
		return $resultForward->forward('edit');
	}
}

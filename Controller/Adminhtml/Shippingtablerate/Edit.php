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
 
 
class Edit extends \Experius\TableRateManager\Controller\Adminhtml\Shippingtablerate {

	protected $resultPageFactory;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	){
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context, $coreRegistry);
	}

	
	public function execute(){
		// 1. Get ID and create model
		$id = $this->getRequest()->getParam('pk');
		$model = $this->_objectManager->create('Experius\TableRateManager\Model\Shipping\Tablerate');
		
		// 2. Initial checking
		if ($id) {
		    $model->load($id);
		    if (!$model->getId()) {
		        $this->messageManager->addError(__('This Shipping Tablerate no longer exists.'));
		        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		        $resultRedirect = $this->resultRedirectFactory->create();
		        return $resultRedirect->setPath('*/*/');
		    }
		}
		$this->_coreRegistry->register('experius_tableratemanager_shipping_tablerate', $model);
		
		// 5. Build edit form
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();
		$this->initPage($resultPage)->addBreadcrumb(
		    $id ? __('Edit Shipping Tablerate') : __('New Shipping Tablerate'),
		    $id ? __('Edit Shipping Tablerate') : __('New Shipping Tablerate')
		);
		$resultPage->getConfig()->getTitle()->prepend(__('Shipping Tablerates'));
		$resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Shipping Tablerate'));
		return $resultPage;
	}
}

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
 
 
class Delete extends \Experius\TableRateManager\Controller\Adminhtml\Shippingtablerate {


	
	public function execute(){
		/** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		$resultRedirect = $this->resultRedirectFactory->create();
		// check if we know what should be deleted
		$id = $this->getRequest()->getParam('pk');
		if ($id) {
		    try {
		        // init model and delete
		        $model = $this->_objectManager->create('Experius\TableRateManager\Model\Shipping\Tablerate');
		        $model->load($id);
		        $model->delete();
		        // display success message
		        $this->messageManager->addSuccess(__('You deleted the Shipping Tablerate.'));
		        // go to grid
		        return $resultRedirect->setPath('*/*/');
		    } catch (\Exception $e) {
		        // display error message
		        $this->messageManager->addError($e->getMessage());
		        // go back to edit form
		        return $resultRedirect->setPath('*/*/edit', ['pk' => $id]);
		    }
		}
		// display error message
		$this->messageManager->addError(__('We can\'t find a Shipping Tablerate to delete.'));
		// go to grid
		return $resultRedirect->setPath('*/*/');
	}
}

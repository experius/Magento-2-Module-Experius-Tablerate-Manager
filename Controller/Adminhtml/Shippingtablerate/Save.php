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
 
 
class Save extends \Magento\Backend\App\Action {

	protected $dataPersistor;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
	){
		$this->dataPersistor = $dataPersistor;
		parent::__construct($context, $coreRegistry);
	}

	
	public function execute(){
		/** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		$resultRedirect = $this->resultRedirectFactory->create();
		$data = $this->getRequest()->getPostValue();
		if ($data) {
		    $id = $this->getRequest()->getParam('pk');
		
		    $model = $this->_objectManager->create('Experius\TableRateManager\Model\Shipping\Tablerate')->load($id);
		    if (!$model->getId() && $id) {
		        $this->messageManager->addError(__('This Shipping Tablerate no longer exists.'));
		        return $resultRedirect->setPath('*/*/');
		    }
		
		    $model->setData($data);
		
		    try {
		        $model->save();
		        $this->messageManager->addSuccess(__('You saved the Shipping Tablerate.'));
		        $this->dataPersistor->clear('experius_tableratemanager_shipping_tablerate');
		
		        if ($this->getRequest()->getParam('back')) {
		            return $resultRedirect->setPath('*/*/edit', ['pk' => $model->getId()]);
		        }
		        return $resultRedirect->setPath('*/*/');
		    } catch (LocalizedException $e) {
		        $this->messageManager->addError($e->getMessage());
		    } catch (\Exception $e) {
		        $this->messageManager->addException($e, __('Something went wrong while saving the Shipping Tablerate.'));
		    }
		
		    $this->dataPersistor->set('experius_tableratemanager_shipping_tablerate', $data);
		    return $resultRedirect->setPath('*/*/edit', ['pk' => $this->getRequest()->getParam('pk')]);
		}
		return $resultRedirect->setPath('*/*/');
	}
}

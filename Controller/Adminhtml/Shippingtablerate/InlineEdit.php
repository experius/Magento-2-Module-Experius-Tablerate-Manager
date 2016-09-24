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
 
 
class InlineEdit extends \Magento\Backend\App\Action {

	protected $jsonFactory;

	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\Controller\Result\JsonFactory $jsonFactory
	){
		parent::__construct($context);
		$this->jsonFactory = $jsonFactory;
	}

	
	public function execute(){
		/** @var \Magento\Framework\Controller\Result\Json $resultJson */
		$resultJson = $this->jsonFactory->create();
		$error = false;
		$messages = [];
		
		if ($this->getRequest()->getParam('isAjax')) {
		    $postItems = $this->getRequest()->getParam('items', []);
		    if (!count($postItems)) {
		        $messages[] = __('Please correct the data sent.');
		        $error = true;
		    } else {
		        foreach (array_keys($postItems) as $modelid) {
		            /** @var \Magento\Cms\Model\Block $block */
		            $model = $this->_objectManager->create('Experius\TableRateManager\Model\Shipping\Tablerate')->load($modelid);
		            try {
		                $model->setData(array_merge($model->getData(), $postItems[$modelid]));
		                $model->save();
		            } catch (\Exception $e) {
		                $messages[] = "[Shipping Tablerate ID: {$modelid}]  {$e->getMessage()}";
		                $error = true;
		            }
		        }
		    }
		}
		
		return $resultJson->setData([
		    'messages' => $messages,
		    'error' => $error
		]);
	}
}

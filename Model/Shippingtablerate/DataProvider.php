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

namespace Experius\TableRateManager\Model\Shippingtablerate;

use Experius\TableRateManager\Model\ResourceModel\Shipping\Tablerate\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface; 
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {

	protected $collection;
	protected $dataPersistor;
	protected $loadedData;

	
	public function __construct(
		$name,
		$primaryFieldName,
		$requestFieldName,
		CollectionFactory $collectionFactory,
		DataPersistorInterface $dataPersistor,
		array $meta = [],
		array $data = []
	){
		$this->collection = $collectionFactory->create();
		$this->dataPersistor = $dataPersistor;
		parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
	}

	
	public function getData(){
		if (isset($this->loadedData)) {
		    return $this->loadedData;
		}
		$items = $this->collection->getItems();
		foreach ($items as $model) {
		    $this->loadedData[$model->getId()] = $model->getData();
		}
		$data = $this->dataPersistor->get('experius_tableratemanager_shipping_tablerate');
		
		if (!empty($data)) {
		    $model = $this->collection->getNewEmptyItem();
		    $model->setData($data);
		    $this->loadedData[$model->getId()] = $model->getData();
		    $this->dataPersistor->clear('experius_tableratemanager_shipping_tablerate');
		}
		
		return $this->loadedData;
	}
}

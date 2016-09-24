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

namespace Experius\TableRateManager\Ui\Component\Listing\Column;
 
 
class ShippingtablerateActions extends \Magento\Ui\Component\Listing\Columns\Column {

	const URL_PATH_DETAILS = 'experius_tableratemanager/shippingtablerate/details';
	const URL_PATH_DELETE = 'experius_tableratemanager/shippingtablerate/delete';
	protected $urlBuilder;
	const URL_PATH_EDIT = 'experius_tableratemanager/shippingtablerate/edit';

	
	public function __construct(
		\Magento\Framework\View\Element\UiComponent\ContextInterface $context,
		\Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
		\Magento\Framework\UrlInterface $urlBuilder,
		array $components = [],
		array $data = []
	){
		$this->urlBuilder = $urlBuilder;
		parent::__construct($context, $uiComponentFactory, $components, $data);
	}

	
	public function prepareDataSource(array $dataSource){
		if (isset($dataSource['data']['items'])) {
		foreach ($dataSource['data']['items'] as & $item) {
		    if (isset($item['pk'])) {
		        $item[$this->getData('name')] = [
		            'edit' => [
		                'href' => $this->urlBuilder->getUrl(
		                    static::URL_PATH_EDIT,
		                    [
		                        'pk' => $item['pk']
		                    ]
		                ),
		                'label' => __('Edit')
		            ],
		            'delete' => [
		                'href' => $this->urlBuilder->getUrl(
		                    static::URL_PATH_DELETE,
		                    [
		                        'pk' => $item['pk']
		                    ]
		                ),
		                'label' => __('Delete'),
		                'confirm' => [
		                    'title' => __('Delete "${ $.$data.title }"'),
		                    'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
		                ]
		            ]
		        ];
		    }
		}
		}
		
		return $dataSource;
	}
}

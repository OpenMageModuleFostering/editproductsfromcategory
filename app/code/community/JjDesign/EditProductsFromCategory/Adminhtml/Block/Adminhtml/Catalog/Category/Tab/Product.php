<?php
class JjDesign_EditProductsFromCategory_Adminhtml_Block_Adminhtml_Catalog_Category_Tab_Product extends Mage_Adminhtml_Block_Catalog_Category_Tab_Product
{

    protected function _prepareColumns()
    {
        $this->addColumn('in_category', array(
            'header_css_class' => 'a-center',
            'type'      => 'checkbox',
            'name'      => 'in_category',
            'values'    => $this->_getSelectedProducts(),
            'align'     => 'center',
            'index'     => 'entity_id'
        ));

		$this->addColumn('name', array(
            'header'    => Mage::helper('catalog')->__('Name'),
            'index'     => 'name'
        ));
        $this->addColumn('sku', array(
            'header'    => Mage::helper('catalog')->__('SKU'),
            'width'     => '80',
            'index'     => 'sku'
        ));
        $this->addColumn('price', array(
            'header'    => Mage::helper('catalog')->__('Price'),
            'type'  => 'currency',
            'currency_code' => (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE),
            'index'     => 'price'
        ));

        $this->addColumn('position', array(
            'header'    => Mage::helper('catalog')->__('Position'),
            'width'     => '70',
            'type'      => 'number',
            'index'     => 'position',
            'editable'  => true
        ));
        $this->addColumn('action',
            array(
                'header'    => Mage::helper('catalog')->__('Action'),
                'width'     => '50px',
                'type'      => 'action',
                'getter'     => 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('catalog')->__('Edit'),
                        'url'     => array(
                            'base'=>'*/catalog_product/edit',
                            'params'=>array('store'=>$this->getRequest()->getParam('store'))
                        ),
                        'field'   => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
        ));
        return parent::_prepareColumns();
    }
}
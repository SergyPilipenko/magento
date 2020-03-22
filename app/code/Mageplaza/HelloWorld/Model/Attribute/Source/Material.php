<?php

namespace Mageplaza\HelloWorld\Model\Attribute\Source;
use Magento\Framework\App\Config\ScopeConfigInterface;
class Material
{
    /**
     * Get all options
     * @return array
     */

    public function toOptionArray()
    {
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
        $categoryCollection = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
        $categories = $categoryCollection->create()
            ->addAttributeToSelect('*')
            ;
        foreach ($categories as $category)
        {

            $category_options[] = ['value' => $category->getId(),'label'=>__($category->getName() .'_'.$category->getId()) ];
        }

        return $category_options;
    }

}

<?php
namespace Mastery\Product\Block;

class Custom extends \Magento\Catalog\Block\Product\View
{
    public function getAnyCustomValue()
    {

        $product = $this->getProduct();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $catalog_rule_collection = $objectManager->create('\Magento\CatalogRule\Model\RuleFactory')
            ->create()
            ->getCollection();

        if (!empty($catalog_rule_collection)) {
            foreach ($catalog_rule_collection as $catalog_rule) {
                $ruleData = $catalog_rule->toArray();

                $toDate = $catalog_rule['to_date'];
                $proructId = $catalog_rule->getMatchingProductIds();
            }
        }
        $ruleProducts =  array_keys($proructId);
        $currentProductId = $product->getId();

        if ($product->getSpecialToDate()) {
            $value = $product->getSpecialToDate();
            $toDate = explode(' ', $value);
            return str_replace('-', '/', $toDate[0]);
        }
        return $product->getFinalPrice();
    }

    private function getProductsForRule()
    {
    }
}

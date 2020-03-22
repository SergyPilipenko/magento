<?php
namespace Perspective\TutorialProductPage\Helper;

class Custom extends \Magento\Framework\App\Helper\AbstractHelper
{
    private $_avialableSku = [
        'MJ01',
        'MJ02',
        'MJ03',
        'WT08'
    ];
    public function validateProductBySku($sku)
    {
        if (in_array($sku, $this->getValidSkuArray())) {
            return true;
        } else {
            return false;
        }
    }
    protected function getValidSkuArray()
    {
        return $this->_avialableSku;
    }
}


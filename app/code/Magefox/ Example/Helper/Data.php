<?php
namespace Magefox\Example\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function upperString($string)
    {
        return strtoupper($string);
    }
}

<?php
namespace Magefox\Example\Observer;

use Magento\Framework\Event\ObserverInterface;

class Fire implements ObserverInterface
{
    /**
     * Test observer to echo "Done"
     *
     * @param \Magento\Framework\Event\Observer $observer
     *
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo "Done";
    }
}

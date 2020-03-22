<?php
namespace Mageplaza\HelloWorld\Controller\Index;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var FilterBuilder
     */
    private $filterBuilder;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,

        \Mageplaza\HelloWorld\Model\PostFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $filter = $this->filterBuilder
            ->setField('name')
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters([$filter])
            ->create();

        $post = $this->_postFactory->create();
        $collection = $post->getCollection()->addFieldToFilter('category','category');

        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}

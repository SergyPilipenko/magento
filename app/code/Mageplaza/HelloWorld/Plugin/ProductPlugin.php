<?php

namespace Mageplaza\HelloWorld\Plugin;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ProductPlugin
{
    protected $_productRepository;
    protected $_serchCriteriaBuilder;
    protected $config;



    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        ScopeConfigInterface $config,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,

        \Magento\Framework\Api\SearchCriteriaBuilder $criteriaBuilder,

       \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,

        array $data = []
    ) {
        $this->config = $config;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->_productRepository = $productRepository;
        $this->_serchCriteriaBuilder = $criteriaBuilder;

    }
    public function getProductById($product_id)
    {
        if (is_null($product_id)) {
            return null;
        }
        $productModel = $this->_productRepository->getById($product_id);
        return $productModel;
    }

    public function selectedCategory()
    {
       return $this->config->getValue('helloworld/general/enable');
    }
    public function aftergetPageHeading(\Magento\Theme\Block\Html\Title $title, $name)
    {
        $selectedCategory = $this->selectedCategory();
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
        $categoryCollection = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
        $productRepository = $objectManager->get('\Magento\Catalog\Model\ProductRepository');
        $this->_serchCriteriaBuilder->addFilter(ProductInterface::NAME, $title->getPageTitle());
        $serchCriteria = $this->_serchCriteriaBuilder->create();
        $productCollection = $this->_productRepository->getList($serchCriteria);





        foreach ($productCollection->getItems() as $item){
            $categoryIds = $item->getCategoryIds();

            $categories = $categoryCollection->create()
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('entity_id', $categoryIds);
            foreach ($categories as $category) {
                $categoryName =  $category->getName() ;
            }
            if(in_array($selectedCategory,$categoryIds)){
                return $categoryName .'_' . $item->getName() .'_'.$item->getSku();
            }
                return $name;


        }







         // $result = $this->productRepository->getById($this->getProductId());;
    }



}
?>

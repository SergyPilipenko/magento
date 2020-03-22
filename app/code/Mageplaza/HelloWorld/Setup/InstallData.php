<?php

namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'mp_new_attribute',
            [
                'type' => 'varchar',
                'label' => 'Mageplaza Attribute',
                'input' => 'text',
                'sort_order' => 100,
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => '',
                'backend' => ''
            ]
        );
    }
}
/*
namespace Mageplaza\HelloWorld\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'sample_attributes',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Sample Atrribute',
                'input' => 'select',
                'class' => '',
                'source' => [
                ['label\' => __(\'Cotton\'), \'value\' => \'cotton\'],
                [\'label\' => __(\'Leather\'), \'value\' => \'leather\'],
                [\'label\' => __(\'Silk\'), \'value\' => \'silk\'],
                [\'label\' => __(\'Denim\'), \'value\' => \'denim\'],
                [\'label\' => __(\'Fur\'), \'value\' => \'fur\'],
                [\'label\' => __(\'Wool\'), \'value\' => \'wool']
            ],
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }
}*/
/*
namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory

    private $eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory

    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'clothing_material',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Clothing Material',
                'input' => 'select',
                'source' => 'Mageplaza\HelloWorld\Model\Attribute\Source\Material',
                'frontend' => 'Mageplaza\HelloWorld\Model\Attribute\Frontend\Material',
                'backend' => 'Mageplaza\HelloWorld\Model\Attribute\Backend\Material',
                'required' => false,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $setup->startSetup();


        // Get tutorial_simplenews table
        $tableName = $setup->getTable('mageplaza_helloworld_post');
        // Check if the table already exists
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            // Declare data
            $data = [
                [
                    'name' => 'How to create a simple module',
                    'url_key' => 'The summary',
                    'post_content' => 'The description',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'category' => 'category',
                    'tags' => 1
                ],
                [
                    'name' => 'Create a module with custom database table',
                    'url_key' => 'The summary',
                    'post_content' => 'The description',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'category' => 'category',
                    'tags' => 1
                ]
                ,
                [
                    'name' => 'Create a module with custom database table',
                    'url_key' => 'The summary',
                    'post_content' => 'The description',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'category' => 'category',
                    'tags' => 1
                ]
            ];

            // Insert data to table
            foreach ($data as $item) {
                $setup->getConnection()->insert($tableName, $item);
            }
        }

        $setup->endSetup();
    }
}*/

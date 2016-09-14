<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\FixtureInterface;

/**
 * Class AssertProductSkuAutoGenerated
 */
class AssertProductSkuAutoGenerated extends AbstractConstraint
{
    /**
     * Asserts that SKU successfully generated
     *
     * @param FixtureInterface $product
     * @param CatalogProductIndex $productGrid
     * @return void
     */
    public function processAssert(FixtureInterface $product, CatalogProductIndex $productGrid)
    {
        $filter = ['sku' => $product->getName()];
        $productGrid->open();
        \PHPUnit_Framework_Assert::assertTrue(
            $productGrid->getProductGrid()->isRowVisible($filter),
            'SKU is not automatically generated for a product.'
        );
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function toString()
    {
        return 'Sku successfully generated.';
    }
}

<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_BetterWishlistGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category\Item;

use Exception;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\BetterWishlist\Api\BetterWishlistRepositoryInterface;
use Mageplaza\BetterWishlist\Model\CategoryFactory;
use Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category;

/**
 * Class Add
 * @package Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category\Item
 */
class Add extends Category
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
        BetterWishlistRepositoryInterface $wishlistRepository,
        CategoryFactory $categoryFactory,
        GetCustomer $getCustomer
    ) {
        parent::__construct(
            $wishlistRepository,
            $categoryFactory,
            $getCustomer
        );
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        try {
            $customerId = $this->checkLogin($context);
            $product = isset($args['input']['sku'])
                ? $this->getProductBySku($args['input']['sku'])
                : $this->getProductById((int)$this->checkItemInput($args, 'product_id'));
            $categoryId = $this->checkItemInput($args, 'category_id');

            return $this->wishlistRepository->addItemToCategory($product->getEntityId(), $categoryId, $customerId);
        } catch (Exception $exception) {
            throw new GraphQlInputException(__($exception->getMessage()));
        }
    }

    public function getProductBySku(string $sku): ProductInterface
    {
        return $this->productRepository->get($sku);
    }

    public function getProductById(int $id): ProductInterface
    {
        return $this->productRepository->getById($id);
    }
}

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

namespace Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category;

use Exception;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category;

/**
 * Class Delete
 * @package Mageplaza\BetterWishlistGraphQl\Model\Resolver\Category
 */
class Delete extends Category
{
    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $customerId = $this->checkLogin($context);
        $categoryId   = isset($args['input']['category_id'])?$args['input']['category_id']:'';

        try {
            return $this->wishlistRepository->deleteCategory($categoryId, $customerId);
        } catch (Exception $exception) {
            throw new GraphQlInputException(__($exception->getMessage()));
        }
    }
}

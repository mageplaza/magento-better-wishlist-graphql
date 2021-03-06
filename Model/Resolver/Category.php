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

namespace Mageplaza\BetterWishlistGraphQl\Model\Resolver;

use Exception;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Mageplaza\BetterWishlist\Api\BetterWishlistRepositoryInterface;
use Mageplaza\BetterWishlist\Model\CategoryFactory as MpWishlistCategoryFactory;

/**
 * Class Category
 * @package Mageplaza\BetterWishlistGraphQl\Model\Resolver
 */
abstract class Category implements ResolverInterface
{
    /**
     * @var BetterWishlistRepositoryInterface
     */
    protected $wishlistRepository;

    /**
     * @var GetCustomer
     */
    protected $getCustomer;

    /**
     * @var MpWishlistCategoryFactory
     */
    protected $mpWishlistCategoryFactory;

    /**
     * Config constructor.
     *
     * @param BetterWishlistRepositoryInterface $wishlistRepository
     * @param MpWishlistCategoryFactory $mpWishlistCategoryFactory
     * @param GetCustomer $getCustomer
     */
    public function __construct(
        BetterWishlistRepositoryInterface $wishlistRepository,
        MpWishlistCategoryFactory $mpWishlistCategoryFactory,
        GetCustomer $getCustomer
    ) {
        $this->wishlistRepository        = $wishlistRepository;
        $this->getCustomer               = $getCustomer;
        $this->mpWishlistCategoryFactory = $mpWishlistCategoryFactory;
    }

    /**
     * @param $context
     *
     * @return int|null
     * @throws GraphQlInputException
     * @throws Exception
     */
    public function checkLogin($context)
    {
        if ($context->getExtensionAttributes()->getIsCustomer() === false) {
            throw new GraphQlInputException(__('Please login to access the feature!'));
        }
        $customer = $this->getCustomer->execute($context);

        return $customer->getId();
    }

    /**
     * @param $args
     *
     * @return \Mageplaza\BetterWishlist\Model\Category
     */
    public function createCategoryInput($args)
    {
        $categoryData = isset($args['input']) ? $args['input'] : [];

        return $this->mpWishlistCategoryFactory->create()->setData($categoryData);
    }

    /**
     * @param array $args
     * @param string $key
     *
     * @return string
     */
    public function checkItemInput($args, $key)
    {
        return isset($args['input'][$key]) ? $args['input'][$key] : '';
    }
}

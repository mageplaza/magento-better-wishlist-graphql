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

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\BetterWishlist\Api\ConfigRepositoryInterface;

/**
 * Class Config
 * @package Mageplaza\BetterWishlistGraphQl\Model\Resolver
 */
class Config implements ResolverInterface
{
    /**
     * @var ConfigRepositoryInterface
     */
    private $configRepository;

    /**
     * Config constructor.
     *
     * @param ConfigRepositoryInterface $configRepository
     */
    public function __construct(
        ConfigRepositoryInterface $configRepository
    ) {
        $this->configRepository = $configRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        return $this->configRepository->getConfigs($context->getExtensionAttributes()->getStore()->getId());
    }
}

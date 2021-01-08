# Magento Better Wishlist GraphQL

**Magento 2 Better Wishlist GraphQL is now a part of the Mageplaza Better Wishlist extension that adds GraphQL features. This supports PWA Studio.** 

[Mageplaza Better Wishlist for Magento 2](https://www.mageplaza.com/magento-2-better-wishlist/) is a powerful module that enhances the customer experience by allowing them to create and add favorite items to wishlists. You can reduce the abandonment rate in this way easily as customers will be more likely to return and purchase their wishlist items. You can then enjoy the benefits indirectly. 

In the Magento 2 Default, customers can create only one wishlist with the limited ability to edit and customize. Mageplaza Better Wishlist is doing more than that by eliminating the limitations of Magento 2 Default. It allows customers to create multiple wishlists and modify their wishlists easily. Mageplaza Better Wishlist extension allows both customers and store admins to control the wishlists better. It actually brings convenience and satisfaction that everyone wants when shopping online. 

The first feature of the Mageplaza Better Wishlist extension to highlight is the ability to create multiple wishlists instead of only one in the Magento 2 Default. Your customers’ favorite items might be different in category, color, material, or types. It’s good to help them save their wish-to-buy items neatly and systematically, which is easy to track and find whenever they want to buy them next time. You can also create multiple pre-made wishlists from the admin backend to suggest to customers. 

The extension is designed to make it the fastest and most convenient for customers to make a wish list. That’s why the pop-up and Ajax techniques are utilized to deliver a better user experience. Accordingly, when customers add an item to the wishlist, a pop-up will display and show the available customers’ wishlists and they can quickly choose where to add the current item. Or, they can also create a new wishlist right via the pop-up. Ajax loading technique guarantees that the whole page will not be reloaded when customers add an item to a specific wishlist. Therefore, customers can perform any actions on the wishlists without affecting the page loading speed and the entire performance of your website. 

Besides the flexibility in creating wishlists, Mageplaza Better Wishlist also allows your customers to edit their wishlist with ease. They can copy, change, or remove items in the wishlist quickly via functional editable buttons. 

Mageplaza Better Wishlist provides you with a detailed report that enables you to track your customers’ wishlists. From the report, you will know which products your customers want to purchase and understand customers’ purchasing behavior better. Then take advantage to create more strategic marketing and sales planning.

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-better-wishlist-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:**
Magento Better Wishlist GraphQL requires installing [Mageplaza Better Wishlist](https://www.mageplaza.com/magento-2-better-wishlist/) in your Magento installation.

## 2. How to use

To perform GraphQL queries in Magento, please do the following requirements:

- Use Magento 2.3.x or higher. Set your site to [developer mode](https://www.mageplaza.com/devdocs/enable-disable-developer-mode-magento-2.html).
- Set GraphQL endpoint as `http://<magento2-server>/graphql` in url box, click **Set endpoint**.
  (e.g. `http://dev.site.com/graphql`)
- To view the queries that the **Mageplaza Better Wishlist GraphQL** extension supports, you can look in `Docs > Query` in the right corner

## 3. Devdocs

- [Magento 2 Better WishlistRest API & examples](https://documenter.getpostman.com/view/10589000/TVsye5AH)
- [Magento 2 Better Wishlist GraphQL & examples](https://documenter.getpostman.com/view/10589000/TVsye5AK)

## 4. Contribute to this module

Feel free to **Fork** and contribute to this module. You can create a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- If you find this project helpful, please give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)

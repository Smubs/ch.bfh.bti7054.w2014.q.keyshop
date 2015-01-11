Keyshop
===================================

## Environment dependencies
* Apache with PHP >= 5.5
* MySQL >= 5.6

## Install instructions

1. Create MySQL Database with <code>database/db_dump.sql</code>.
2. Set an encryption key in <code>application/config/config.sample.php</code> and rename the file to <code>application/config/config.php</code>
3. Set your MySQL data in <code>application/config/database.sample.php</code> and rename it to <code>application/config/database.php</code>


The default admin user has the email <code>admin@keyshop.ch</code> and the password <code>123456</code>.

### Current deploy

[![Deployment status from keyshop.dploy.io](https://keyshop.dploy.io/badge/88313865858892/12347.png)](http://keyshop.dploy.io)

[keyshop.kioh.ch](http://keyshop.kioh.ch)

## Used frameworks, libraries and services

<ul>
    <li>PHP
        <ul>
            <li>CodeIgniter v2.2</li>
            <li>doctrine v2.4</li>
        </ul>
    </li>
    <li>JavaScript
        <ul>
            <li>AngularJS v1.2.26</li>
            <li>AngularJS MultiSelect v2.0.2</li>
            <li>angular-cookie</li>
            <li>jQuery v2.1.3</li>
        </ul>
    </li>
    <li>HTML & CSS
        <ul>
            <li>Bootstrap v3.2.0</li>
            <li>Font Awesome v4.2.0</li>
            <li>Animate.css</li>
            <li>Lesscss</li>
        </ul>
    </li>
    <li>Services
        <ul>
            <li>[payrexx.com](https://payrexx.com) service</li>
        </ul>
    </li>
</ul>

## Features

<ul>
    <li>Frontend
        <ul>
            <li>Product
                <ul>
                    <li>Overview</li>
                    <li>Detailview</li>
                    <li>Filter by category</li>
                    <li>Sort by price and name</li>
                    <li>Search</li>
                </ul>
            </li>
            <li>Cart
                <ul>
                    <li>Stored in cookie</li>
                    <li>Add product to cart</li>
                    <li>Delete product from cart</li>
                </ul>
            </li>
            <li>Usersystem
                <ul>
                    <li>Login/Logout/Register</li>
                    <li>Edit profile</li>
                    <li>Modern password crypt</li>
                </ul>
            </li>
            <li>Order
                <ul>
                    <li>Order a cart</li>
                    <li>Pay order with payrexx</li>
                    <li>Sends email with ordered keys</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>Backend
        <ul>
            <li>Product
                <ul>
                    <li>Overview</li>
                    <li>Full-Text-Search</li>
                    <li>Detailview -> Edit/Add/Delete</li>
                    <li>Assign to more than one category</li>
                    <li>Discount price</li>
                    <li>Picture upload</li>
                </ul>
            </li>
            <li>Category
                <ul>
                    <li>Overview</li>
                    <li>Full-Text-Search</li>
                    <li>Detailview -> Edit/Add/Delete</li>
                </ul>
            </li>
            <li>User
                <ul>
                    <li>Overview</li>
                    <li>Full-Text-Search</li>
                    <li>Detailview -> Edit/Add/Delete</li>
                </ul>
            </li>
            <li>Key
                <ul>
                    <li>Overview</li>
                    <li>Full-Text-Search</li>
                    <li>Detailview -> Edit/Add/Delete</li>
                    <li>Assign keys to product</li>
                    <li>Insert more than one key at once</li>
                </ul>
            </li>
            <li>Order
                <ul>
                    <li>Overview</li>
                    <li>Id-Search</li>
                    <li>Detailview</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

## Screencast

[Frontend](screencast/keyshop_frontend.webm)
[Backend](screencast/keyshop_backend.webm)

[E-Mail Screenshot](screencast/keyshop_order_email.png)

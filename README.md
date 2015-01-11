Keyshop
===================================

## Environment Dependencies
* Apache with PHP >= 5.5
* MySQL >= 5.6

## Install instructions

1. Create MySQL Database with <code>database/db_dump.sql</code>.
2. Set an encryption key in <code>application/config/config.sample.php</code> and rename the file to <code>application/config/config.php</code>
3. Set your MySQL data in <code>application/config/database.sample.php</code> and rename it to <code>application/config/database.php</code>


The default admin user has the email <code>admin@keyshop.ch</code> and the password <code>123456</code>.

### Current deploy

[![Deployment status from keyshop.dploy.io](https://keyshop.dploy.io/badge/88313865858892/12347.png)](http://keyshop.dploy.io)

## Used frameworks and libraries

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
</ul>
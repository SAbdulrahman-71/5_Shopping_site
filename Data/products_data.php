<?php
$watches = array(
    array('item_id' => 101, 'name' => 'Digital Watch', 'price' => 99.99, 'img' => 'images/products_items/watches/Digital_Watch.webp'),
    array('item_id' => 102, 'name' => 'Analog Watch', 'price' => 149.99, 'img' => 'images/products_items/watches/Analog_watch.webp'),
    array('item_id' => 103, 'name' => 'Sport Watch', 'price' => 119.99, 'img' => 'images/products_items/watches/1.png'),
    array('item_id' => 104, 'name' => 'Luxury Watch', 'price' => 999.99, 'img' => 'images/products_items/watches/1.png'),
);

$books = array(
    array('item_id' => 201, 'name' => 'Fiction Book', 'price' => 19.99),
    array('item_id' => 202, 'name' => 'Non-Fiction Book', 'price' => 29.99),
    array('item_id' => 203, 'name' => 'Science Book', 'price' => 24.99),
    array('item_id' => 204, 'name' => 'History Book', 'price' => 34.99),
);

$shoes = array(
    array('item_id' => 301, 'name' => 'Men\'s Shoes', 'price' => 79.99),
    array('item_id' => 302, 'name' => 'Women\'s Shoes', 'price' => 89.99),
    array('item_id' => 303, 'name' => 'Running Shoes', 'price' => 99.99),
    array('item_id' => 304, 'name' => 'Casual Shoes', 'price' => 69.99),
);

$electronic_devices = array(
    array('item_id' => 401, 'name' => 'Smartphone', 'price' => 699.99),
    array('item_id' => 402, 'name' => 'Laptop', 'price' => 1199.99),
    array('item_id' => 403, 'name' => 'Tablet', 'price' => 499.99),
    array('item_id' => 404, 'name' => 'Smart Watch', 'price' => 299.99),
);

$pens = array(
    array('item_id' => 501, 'name' => 'Ballpoint Pen', 'price' => 4.99),
    array('item_id' => 502, 'name' => 'Fountain Pen', 'price' => 19.99),
    array('item_id' => 503, 'name' => 'Gel Pen', 'price' => 6.99),
    array('item_id' => 504, 'name' => 'Calligraphy Pen', 'price' => 29.99),
);

$tables = array(
    array('item_id' => 601, 'name' => 'Coffee Table', 'price' => 199.99),
    array('item_id' => 602, 'name' => 'Dining Table', 'price' => 399.99),
    array('item_id' => 603, 'name' => 'Study Table', 'price' => 149.99),
    array('item_id' => 604, 'name' => 'Outdoor Table', 'price' => 299.99),
);



$products = array(
    array( // product 1
        'id' => 1,
        'name' => 'Watches',
        'description' => 'Timepieces for every occasion.',
        'items' => $watches,
    ),
    array( /// product 2
        'id' => 2,
        'name' => 'Books',
        'description' => 'Explore worlds beyond your imagination.',
        'items' => $books,
    ),
    array(
        'id' => 3,
        'name' => 'Shoes',
        'description' => 'Step into comfort and style.',
        'items' => $shoes,
    ),
    array(
        'id' => 4,
        'name' => 'Electronic Devices',
        'description' => 'Cutting-edge technology at your fingertips.',
        'items' => $electronic_devices,
    ),
    array(
        'id' => 5,
        'name' => 'Pens',
        'description' => 'Elegant writing instruments for professionals.',
        'items' => $pens,
    ),
    array(
        'id' => 6,
        'name' => 'Tables',
        'description' => 'Furniture pieces for every space.',
        'items' => $tables,
    ),

);

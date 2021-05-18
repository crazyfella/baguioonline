<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('main'));
});

Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Shop', route('shop.index'));
});

Breadcrumbs::for('product-details', function ($trail) {
    $trail->parent('home');
    $trail->push('product', route('product-details'));
});

Breadcrumbs::for('contact-us', function ($trail) {
    $trail->parent('home');
    $trail->push('contact us', route('main'));
});
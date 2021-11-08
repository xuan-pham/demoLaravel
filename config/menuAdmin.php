<?php 
return [
    [
        'label' =>'Dashboard',
        'route' =>'admin.dashboard',
        'icon'=>'fa-blog'
    ],
    [
        'label' =>' Category Manager',
        'route' =>'category.index',
        'icon'=>'fa-book-open',
        'items'=>[
            [
             'label'=>'List Category',
             'route'=>'category.index'
            ],
            [
             'label'=>'Add New Category',
             'route'=>'category.create'
            ]
            
        ]
    ],
    [
        'label' =>'Product Manager',
        'route' =>'product.index',
        'icon'=>'fa-archive',
        'items'=>[
            [
                'label'=>'List Product',
                'route'=>'product.index'
            ],
            [
                'label'=>'Add New Product',
                'route'=>'product.create'
            ]
            
        ]
    ],
    [
        'label' =>'Blog Manager',
        'route' =>'blog.index',
        'icon'=>'fa-blog',
        'items'=>[
            [
                'label'=>'List Blog',
                'route'=>'blog.index'
            ],
            [
                'label'=>'Add New Blog',
                'route'=>'blog.create'
            ]
            
        ]
    ],
    [
        'label' =>'Banner Manager',
        'route' =>'banner.index',
        'icon'=>'fa-sliders-h',
        'items'=>[
            [
                'label'=>'List Banner',
                'route'=>'banner.index'
            ],
            [
                'label'=>'Add New Banner',
                'route'=>'banner.create'
            ]
            
        ]
    ],
    [
        'label' =>'Order Manager',
        'route' =>'order.index',
        'icon'=>'fa-cart-arrow-down',
        'items'=>[
            [
                'label'=>'List Order',
                'route'=>'order.index'
            ],
            // [
            //     'label'=>'Add New Order',
            //     'route'=>'order.create'     
            // ]
            
        ]
    ],
    [
        'label' =>'Account Manager',
        'route' =>'account.index',
        'icon'=>'fa-user-circle',
        'items'=>[
            [
                'label'=>'List Account',
                'route'=>'account.index'
            ],
            [
                'label'=>'Add New Account',
                'route'=>'account.create'
            ]
           
        ]
    ],
    [
        'label' =>'Change Password',
        'route' =>'changepw.index',
        'icon'=>'fa-blind',
    ],
    [
        'label' =>'Logout',
        'route' =>'logout',
        'icon'=>'fa-sign-out-alt'
    ],
    
]
?>
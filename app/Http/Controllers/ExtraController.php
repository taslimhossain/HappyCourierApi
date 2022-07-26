<?php
namespace App\Http\Controllers;
use App\Http\Traits\Helpers\ApiResponseTrait;

class ExtraController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {

    }

    public function category()
    {
        $CategoryData = 
        [
            [
              '_id'=> '61b0d3975741dd2e949d53f9',
              'children'=> ['Sports', 'Fitness'],
              'parent'=> 'Sports & Fitness',
              'type'=> 'Sports & Fitness',
              'icon'=> 'https://i.ibb.co/qNCvxT0/dumbbell.png',
              'status'=> 'Show',
            ],
            [
              '_id'=> '61b0d3975741dd2e949d5407',
              'children'=> ['Oil', 'Rice', 'Flour', 'Dry Vegetable', 'Spices & Mixes'],
              'parent'=> 'Cooking Essentials',
              'type'=> 'Grocery',
              'icon'=> 'https://i.ibb.co/hBv30Rt/frying-pan.png',
              'status'=> 'Show',
            ],
            [
              '_id'=> '61b0d3975741dd2e949d5408',
              'children'=> ['Fresh Seafood'],
              'parent'=> 'Fresh Seafood',
              'type'=> 'Grocery',
              'icon'=> 'https://i.ibb.co/pfscwF4/shrimp.png',
              'status'=> 'Show',
            ],
            [
              '_id'=> '61b0d3975741dd2e949d5409',
              'children'=> ['Dry Fruits', 'Fresh Fruits', 'Fresh Vegetable'],
              'parent'=> 'Fruits & Vegetable',
              'type'=> 'Grocery',
              'icon'=> 'https://i.postimg.cc/RZ275n3f/cabbage.png',
              'status'=> 'Show',
            ]
          ];
          ;
    
        return $this->successResponse($CategoryData);
    }

    public function products()
    {
        $ProductData = 
        [
            [
              '_id' => '61c355337f19aa31349af4fe',
              'price' => 14,
              'discount' => 0,
              'tag' => ['["lettuce","fresh vegetable"]'],
              'flashSale' => false,
              'status' => 'Show',
              'children' => 'Fresh Vegetable',
              'createdAt' => '2021-12-22T16:41:23.216Z',
              'description' =>
                'Most fresh vegetables are low in calories and have a water content in excess of 70 percent, with only about 3.5 percent protein and less than 1 percent fat. ... The root vegetables include beets, carrots, radishes, sweet potatoes, and turnips. Stem vegetables include asparagus and kohlrabi.',
              'image' => 'https://i.postimg.cc/ZRynchJY/Green-Leaf-Lettuce-each.jpg',
              'originalPrice' => 14,
              'parent' => 'Fruits & Vegetable',
              'quantity' => 15,
              'slug' => 'green-leaf-lettuce',
              'title' => 'Green Leaf Lettuce',
              'type' => 'Grocery',
              'unit' => 'each',
              'updatedAt' => '2022-01-19T04:22:32.047Z',
              'sku' => 'F001',
            ],
            [
              '_id' => '61c355337f19aa31349af3df',
              'price' => 8,
              'discount' => 0,
              'tag' => ['["baby care","baby accessories"]'],
              'flashSale' => false,
              'status' => 'Show',
              'children' => 'Baby Accessories',
              'createdAt' => '2021-12-22T16:41:23.186Z',
              'description' =>
                'Baby Products are products intended to be used on infants and children under the age of three. Baby products are specially formulated to be mild and non-irritating and use ingredients that are selected for these properties. Baby products include baby shampoos and baby lotions, oils, powders and creams.',
              'image' =>
                'https://i.ibb.co/sWBMfVP/Freshmaker-Baby-Wet-Wipes-With-Cover-72pcs.jpg',
              'originalPrice' => 8,
              'parent' => 'Baby Care',
              'quantity' => 100,
              'slug' => 'freshmaker-wipes',
              'title' => 'Freshmaker Wipes',
              'type' => 'Health Care',
              'unit' => '72pcs',
              'updatedAt' => '2021-12-22T16:41:23.186Z',
              'sku' => '',
            ]
        ];
        return $this->successResponse($ProductData);
    }

    public function orders()
    {
        $OrderData = 
        [
            [
                '_id' => '612abc3695aeaf0016ab4ff3',
                'cart' => [
                [
                    'price' => 7,
                    'discount' => 30,
                    'tag' => ['Vegetable', 'Corn'],
                    'title' => 'Corn',
                    'slug' => 'corn',
                    'parent' => 'Fruits & Vegetable',
                    'children' => 'Vegetable',
                    'image' => 'https://i.postimg.cc/2S74hbKw/Corn.jpg',
                    'originalprice' => 10,
                    'unit' => '1/5kg',
                    'quantity' => 1,
                    'type' => 'Grocery',
                    'description' =>
                    'Vegetable, in the broadest sense, any kind of plant life or plant product, namely “vegetable matter”; in common, narrow usage, the term vegetable usually refers to the fresh edible portions of certain herbaceous plants—roots, stems, leaves, flowers, fruit, or seeds.',
                    '__v' => 0,
                    'createdAt' => '2021-08-26T13:25:39.064Z',
                    'updatedAt' => '2021-08-26T13:25:39.064Z',
                    'id' => '6127965254781e22f8ae593d',
                    'itemTotal' => 7,
                ],
                [
                    'price' => 10,
                    'discount' => 10,
                    'tag' => ['Fruit', 'Mangoes'],
                    'title' => 'Mangoes',
                    'slug' => 'mangoes',
                    'parent' => 'Fruits & Vegetable',
                    'children' => 'Fruits',
                    'image' => 'https://i.postimg.cc/qRM6813B/Mangoes.jpg',
                    'originalprice' => 11,
                    'unit' => '1kg',
                    'quantity' => 1,
                    'type' => 'Grocery',
                    'description' =>
                    'Vegetable, in the broadest sense, any kind of plant life or plant product, namely “vegetable matter”; in common, narrow usage, the term vegetable usually refers to the fresh edible portions of certain herbaceous plants—roots, stems, leaves, flowers, fruit, or seeds.',
                    '__v' => 0,
                    'createdAt' => '2021-08-26T13:25:39.062Z',
                    'updatedAt' => '2021-08-26T13:25:39.062Z',
                    'id' => '6127965254781e22f8ae5936',
                    'itemTotal' => 10,
                ],
                [
                    'price' => 13,
                    'discount' => 0,
                    'tag' => ['Vegetable', 'Celery Sticks'],
                    'title' => 'Celery Sticks',
                    'slug' => 'celery-sticks',
                    'parent' => 'Fruits & Vegetable',
                    'children' => 'Vegetable',
                    'image' => 'https://i.postimg.cc/xTHGjFGB/Celery-Sticks.jpg',
                    'originalprice' => 13,
                    'unit' => '1kg',
                    'quantity' => 4,
                    'type' => 'Grocery',
                    'description' =>
                    'Vegetable, in the broadest sense, any kind of plant life or plant product, namely “vegetable matter”; in common, narrow usage, the term vegetable usually refers to the fresh edible portions of certain herbaceous plants—roots, stems, leaves, flowers, fruit, or seeds.',
                    '__v' => 0,
                    'createdAt' => '2021-08-26T13:25:39.064Z',
                    'updatedAt' => '2021-08-26T13:25:39.064Z',
                    'id' => '6127965254781e22f8ae593c',
                    'itemTotal' => 52,
                ],
                [
                    'price' => 7,
                    'discount' => 30,
                    'tag' => ['Meat', 'Chicken'],
                    'title' => 'Chicken Brest',
                    'slug' => 'chicken-brest',
                    'parent' => 'Fish & Meat',
                    'children' => 'Meat',
                    'image' => 'https://i.postimg.cc/c4d2fYD9/chicken-brest.jpg',
                    'originalprice' => 10,
                    'unit' => '1.5kg',
                    'quantity' => 5,
                    'type' => 'Grocery',
                    'description' =>
                    'Vegetable, in the broadest sense, any kind of plant life or plant product, namely “vegetable matter”; in common, narrow usage, the term vegetable usually refers to the fresh edible portions of certain herbaceous plants—roots, stems, leaves, flowers, fruit, or seeds.',
                    '__v' => 0,
                    'createdAt' => '2021-08-26T13:25:39.054Z',
                    'updatedAt' => '2021-08-26T13:25:39.054Z',
                    'id' => '6127965254781e22f8ae5929',
                    'itemTotal' => 35,
                ],
                ],
                'shippingCost' => 10,
                'discount' => 0,
                'name' => 'James J. Allen',
                'address' => '705 Pine Barren Rd, Pooler, GA, 31322  ',
                'contact' => '818-356-8600',
                'email' => 'james@gmail.com',
                'city' => 'GA',
                'country' => 'US',
                'zipCode' => '31322  ',
                'shippingOption' => 'FedEx',
                'paymentMethod' => 'COD',
                'status' => 'Pending',
                'subTotal' => 104,
                'total' => 114,
                'user' => '61531a4f1c38473378ab0828',
                'createdAt' => '2021-08-28T22:44:06.591Z',
                'updatedAt' => '2021-11-19T12:16:17.307Z',
            ]
        ];
        
        return $this->successResponse($OrderData);
    }

    public function getallrider()
    {
        $riderList = [
            [
              '_id' => '619f77b653cc5a1858ef3679',
              'password' => '123456789',
              'name' => 'Sam L. Lankford',
              'image' => 'https://i.ibb.co/ZTWbx5z/team-1.jpg',
              'email' => 'sam@gmail.com',
              'phone' => '505-771-8879',
              'role' => 'Delivery Person',
              'joiningData' => '2021-11-25T11:46:54.266Z',
              'createdAt' => '2021-11-25T11:47:02.762Z',
              'updatedAt' => '2021-11-25T11:47:02.762Z',
            ],
            [
              '_id' => '619f77b653cc5a1858ef367a',
              'password' => '12345678',
              'name' => 'Dorothy R. Brown',
              'image' => 'https://i.ibb.co/d294W8Y/team-4.jpg',
              'email' => 'dorothy@gmail.com',
              'phone' => '708-628-3122',
              'role' => 'Security Guard',
              'joiningData' => '2021-11-25T11:46:54.384Z',
              'createdAt' => '2021-11-25T11:47:02.763Z',
              'updatedAt' => '2021-11-25T11:47:02.763Z',
            ],
        ];
        return $this->successResponse($riderList);
    }

    public function getallmerchants()
    {
        $merchantList = [
            [
                '_id' => '619f77b553cc5a1858ef366b',
                'name' => 'Lester J. Massey',
                'email' => 'lester@gmail.com',
                'password' => '$2a$10$a/lbjpS5XiwwxIi5OJV0c.3v2QV2JYWdCW.ENe2jTsHJGoC9.0fHm',
                'phone' => '715-657-9865',
                'createdAt' => '2021-11-25T11:47:01.876Z',
                'updatedAt' => '2021-11-25T11:47:01.876Z',
                ],
                [
                '_id' => '619f77b553cc5a1858ef366f',
                'name' => 'Josephine M. Peel',
                'email' => 'josephine@gmail.com',
                'password' => '$2a$10$PBrKor.fZ5SXHmS9Wlc2c.10sblRVcwEb3B57.GZKnSfyIFJ9lHg2',
                'phone' => '734-256-1159',
                'createdAt' => '2021-11-25T11:47:01.877Z',
                'updatedAt' => '2021-11-25T11:47:01.877Z',
                ]
        ];
        return $this->successResponse($merchantList);
    }

    public function coupon()
    {
        $couponList = [
            [
                '_id' => '612a3805ea43af2750ca33ba',
                'title' => 'August Gift Voucher',
                'couponCode' => 'AUGUST21',
                'endTime' => '2021-08-31T06:00:00Z',
                'discountPercentage' => 20,
                'minimumAmount' => 1000,
                'productType' => 'Grocery',
                'logo' => 'https://i.ibb.co/PDLPDHc/ins1.jpg',
                'createdAt' => '2021-08-15T13:20:05.898Z',
                'updatedAt' => '2021-10-15T09:21:29.795Z',
                ],
                [
                '_id' => '612a45d4ea43af2750ca33d4',
                'title' => 'Winter Gift Voucher',
                'couponCode' => 'WINTER21',
                'endTime' => '2022-01-31T01:22:00Z',
                'discountPercentage' => 12,
                'minimumAmount' => 350,
                'productType' => 'Cloths',
                'logo' => 'https://i.ibb.co/4thS4Z1/ins2.jpg',
                'createdAt' => '2021-06-20T14:19:00.767Z',
                'updatedAt' => '2021-11-20T14:26:18.873Z',
                ],
                [
                '_id' => '612a4790ea43af2750ca33e3',
                'title' => 'Summer Gift Voucher',
                'couponCode' => 'SUMMER21',
                'endTime' => '2021-10-31T01:21:00Z',
                'discountPercentage' => 15,
                'minimumAmount' => 500,
                'productType' => 'Grocery',
                'logo' => 'https://i.ibb.co/wBBYm7j/ins4.jpg',
                'createdAt' => '2021-04-13T14:26:24.137Z',
                'updatedAt' => '2021-11-15T19:21:45.041Z',
                ],
        ];
        return $this->successResponse($couponList);
    }

}

<?php
class ApiEndPoint
{


    private $object;
    public function __construct()
    {
        $this->object=[
            //Men data
            [
                'display'=>'Men', 'data'=>
                [
                    [
                        'display'=>'Shoes',
                        'products'=>
                            [
                                0=>[
                                    'img'=>'men3s.jpg',
                                    'id'=>19,
                                    'product_name'=>'First shoes Men product',
                                    'price'=>24,
                                    'devise'=>'$'
                                ],
                                1=>
                                    [
                                        'img'=>'men4s.jpg',
                                        'id'=>20,
                                        'product_name'=>'Second shoes Men product',
                                        'price'=>53,
                                        'devise'=>'$'
                                    ],
                                2=>[
                                    'img'=>'men5s.jpg',
                                    'id'=>21,
                                    'product_name'=>'Third shoes Men product',
                                    'price'=>98,
                                    'devise'=>'$'
                                ]
                            ]
                    ],
                    [
                        'display'=>'Clothing','products'=>
                        [
                            0=>[
                                'img'=>'hm1.jpg',
                                'id'=>22,
                                'product_name'=>'First clothing Men product',
                                'price'=>91,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'hm2.jpg',
                                    'id'=>23,
                                    'product_name'=>'Second clothing Men product',
                                    'price'=>200,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'men2.jpg',
                                'id'=>24,
                                'product_name'=>'Third clothing Men product',
                                'price'=>300,
                                'devise'=>'$'
                            ]
                        ]
                    ],
                    [
                        'display'=>'Accesoires','products'=>
                        [
                            0=>[
                                'img'=>'hm1a.jpg',
                                'id'=>29,
                                'product_name'=>'First accessoires Men product',
                                'price'=>78,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'hm2a.jpg',
                                    'id'=>26,
                                    'product_name'=>'Second accessoires Men product',
                                    'price'=>50,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'hm3a.jpg',
                                'id'=>27,
                                'product_name'=>'Third accesoires product',
                                'price'=>70,
                                'devise'=>'$'
                            ]
                        ]
                    ]
                ]

            ],
            //women data
            [
                'display'=>'Women', 'data'=>
                [
                    [
                        'display'=>'Shoes','products'=>
                        [
                            0=>[
                                'img'=>'wm1s.jpg',
                                'id'=>1,
                                'product_name'=>'First shoes women product',
                                'price'=>67,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'wm2s.png',
                                    'id'=>2,
                                    'product_name'=>'Second shoes women product',
                                    'price'=>89,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'wm3s.jpg',
                                'id'=>3,
                                'product_name'=>'Third shoes women product',
                                'price'=>25,
                                'devise'=>'$'
                            ]
                        ]
                    ],
                    [
                        'display'=>'Clothing','products'=>
                        [
                            0=>[
                                'img'=>'wm4.jpg',
                                'id'=>4,
                                'product_name'=>'First clothing women product',
                                'price'=>63,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'wm5.jpg',
                                    'id'=>5,
                                    'product_name'=>'Second clothing women product',
                                    'price'=>24,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'wm6.jpg',
                                'id'=>6,
                                'product_name'=>'Third clothing women product',
                                'price'=>28,
                                'devise'=>'$'
                            ]
                        ]
                    ],
                    [
                        'display'=>'Accesoires','products'=>
                        [
                            0=>[
                                'img'=>'wm1a.jpg',
                                'id'=>7,
                                'product_name'=>'First accessoires women product',
                                'price'=>89,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'wm2a.jpg',
                                    'id'=>8,
                                    'product_name'=>'Second accessoires women product',
                                    'price'=>78,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'wm3a.jpg',
                                'id'=>9,
                                'product_name'=>'Third accesoires women product',
                                'price'=>245,
                                'devise'=>'$'
                            ]
                        ]
                    ]
                ]

            ],
            //kids data
            [
                'display'=>'Kids', 'data'=>
                [
                    [
                        'display'=>'Shoes','products'=>
                        [
                            0=>[
                                'img'=>'kids1s.jpg',
                                'id'=>10,
                                'product_name'=>'First shoes kids product',
                                'price'=>5,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'kids2s.jpg',
                                    'id'=>11,
                                    'product_name'=>'Second shoes kids product',
                                    'price'=>78,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'kids3s.jpg',
                                'id'=>12,
                                'product_name'=>'Third shoes kids product',
                                'price'=>26,
                                'devise'=>'$'
                            ]
                        ]
                    ],
                    [
                        'display'=>'Clothing','products'=>
                        [
                            0=>[
                                'img'=>'kids1.jpg',
                                'id'=>13,
                                'product_name'=>'First clothing kids product',
                                'price'=>42,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'kids2.jpg',
                                    'id'=>14,
                                    'product_name'=>'Second clothing kids product',
                                    'price'=>96,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'kids3.jpg',
                                'id'=>15,
                                'product_name'=>'Third clothing kids product',
                                'price'=>50,
                                'devise'=>'$'
                            ]
                        ]
                    ],
                    [
                        'display'=>'Accesoires','products'=>
                        [
                            0=>[
                                'img'=>'kids1a.jpg',
                                'id'=>16,
                                'product_name'=>'First accessoires kids product',
                                'price'=>32,
                                'devise'=>'$'
                            ],
                            1=>
                                [
                                    'img'=>'kids2a.jpg',
                                    'id'=>17,
                                    'product_name'=>'Second accessoires kids product',
                                    'price'=>12,
                                    'devise'=>'$'
                                ],
                            2=>[
                                'img'=>'kids3a.jpg',
                                'id'=>18,
                                'product_name'=>'Third accesoires kids product',
                                'price'=>56,
                                'devise'=>'$'
                            ]
                        ]
                    ]
                ]

            ]
        ];
    }

    public function getObject()
    {
        echo json_encode($this->object);
    }

    public function getMenData()
    {
        $arr=$this->object[0]['data'];
        echo json_encode($arr);
    }

    public function getWomenData()
    {
        $arr=$this->object[1]['data'];
        echo json_encode($arr);
    }
    public function getKidsData()
    {
        $arr=$this->object[2]['data'];
        echo json_encode($arr);
    }
}


header('content-type:Application/json');
$a=new ApiEndPoint();
if (isset($_GET['req']))
{

    $val=$_GET['req'];
    if (!empty($val))
    {
        switch ($val)
        {
            case 'men_data':
                $a->getMenData();
                break;
            case 'women_data':
                $a->getWomenData();
                break;
            case 'kids_data':
                $a->getKidsData();
                break;
            case 'find':

        }
    }

}
else
{
    $a->getObject();
}

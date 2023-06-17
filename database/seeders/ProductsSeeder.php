<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[//3
            ['image_path' => 'products/rqzxXHEM55vRaaIJTXnoy0mBKMfnPudkmyATNTin.jpg',
            'name' => 'Komputer - zestaw',
            'description' => 'Procesor: AMD Ryzen 5 5600G
            Pamięć RAM [GB]: 8
            Dysk: 512 GB SSD
            Karta graficzna: NVIDIA GeForce GTX 1650
            System operacyjny: Windows 11 Home',
            'amount' => '19',
            'price' => '2999.99',
            'category_id' => '3',
            ],
            ['image_path' => 'products/lJz5eKnixp8tmG25I5GlUBQAw50Yq1cOs7iuL0cm.jpg',
            'name' => 'Komputer - zestaw 3',
            'description' => 'Procesor: AMD Ryzen 7 5800X
            Pamięć RAM [GB]: 16
            Dysk: 2000 GB HDD + 1000 GB SSD
            Karta graficzna: AMD Radeon RX 6700 XT
            System operacyjny: Windows 11 Home
            Pojemność dysku HDD [GB]: 2000
            Pojemność dysku SSD [GB]: 1000',
            'amount' => '10',
            'price' => '7999.99',
            'category_id' => '3',
            ],
            //1
            ['image_path' => 'products/7tZcUzhqM1zpDYvhqcx8sEbIVlBhReujB76tbDsp.jpg',
            'name' => 'Smartfon HUAWEI P60 Pro',
            'description' => 'Wyświetlacz: 6.6", 2340 x 1080px, Dynamic AMOLED 2X
            Pamięć RAM: 8 GB
            Pamięć wbudowana [GB]: 256
            Pojemność akumulatora [mAh]: 4700
            Procesor: Snapdragon 8 Gen 2, Ośmiordzeniowy
            Aparat: Tylny 50 Mpx + 12 Mpx + 10 Mpx, Przedni 12 Mpx',
            'amount' => '423',
            'price' => '5499.00',
            'category_id' => '1',
            ],
            ['image_path' => 'products/cRFcvzBfNffIgqOnGgZuDC4NpuCnVRgxtvnIyCmC.jpg',
            'name' => 'Smartfon SAMSUNG Galaxy S23+',
            'description' => 'Procesor: AMD Ryzen 7 5800X
            Pamięć RAM [GB]: 16
            Dysk: 2000 GB HDD + 1000 GB SSD
            Karta graficzna: AMD Radeon RX 6700 XT
            System operacyjny: Windows 11 Home
            Pojemność dysku HDD [GB]: 2000
            Pojemność dysku SSD [GB]: 1000',
            'amount' => '523',
            'price' => '5299.99',
            'category_id' => '1',
            ],
            //2
            ['image_path' => 'products/7Kt1P9OfhCt9ygOTkwlUWYlAUGedPYEkqGb8XB4j.jpg',
            'name' => 'Laptop LENOVO V15 G2 ITL',
            'description' => 'Ekran: 15.6", 1920 x 1080px
            Procesor: Intel Core i3-1115G4
            Wielkość pamięci RAM [GB]: 8
            Dysk: 256 GB SSD
            Karta graficzna: Intel UHD Graphics
            System operacyjny: Windows 11 Professional',
            'amount' => '58',
            'price' => '2499.00',
            'category_id' => '2',
            ],
            ['image_path' => 'products/g2Yo6clqHBsMUMbhxlyNbGXRtfvQIQQxS6mydRjP.jpg',
            'name' => 'ASUS ROG Strix',
            'description' => 'Ekran: 16", 2560 x 1600px, 240Hz
            Procesor: Intel Core i9-13980HX
            Wielkość pamięci RAM [GB]: 16
            Dysk: 1000 GB SSD
            Karta graficzna: NVIDIA GeForce RTX 4070
            System operacyjny: Windows 11 Home',
            'amount' => '52',
            'price' => '11999.99',
            'category_id' => '2',
            ],
            //4
            ['image_path' => 'products/sJE3nsW84AwNnuoEcEoGDjCVKmOYXRARAoQQVUVT.jpg',
            'name' => 'Mysz LOGITECH G502 Hero',
            'description' => 'Typ myszy: Optyczna
            Rozdzielczość: 25600 dpi
            Komunikacja z komputerem: Przewodowa
            Interfejs: USB',
            'amount' => '583',
            'price' => '245.00',
            'category_id' => '4',
            ],
            ['image_path' => 'products/mt89NPxMLWVp1NNWPWZgHK8jyVQdDrzA6OQnzvAS.jpg',
            'name' => 'Mysz ENDGAME GEAR XM1R',
            'description' => 'Typ myszy: Optyczna
            Rozdzielczość: 19000 dpi
            Komunikacja z komputerem: Przewodowa
            Interfejs: USB',
            'amount' => '532',
            'price' => '229.00',
            'category_id' => '4',
            ],
            //5
            ['image_path' => 'products/b8K4k9Q9zy24uNn7zQxmy2Pax6aRYl8F0r6qTYKJ.jpg',
            'name' => 'Monitor ASUS TUF Gaming VG27AQ 27\"',
            'description' => 'Ekran: 27", 2560 x 1440px, IPS
            Częstotliwość odświeżania obrazu [Hz]: 165
            Czas reakcji matrycy [ms]: 1 [MPRT]
            Jasność ekranu [cd/m2]: 350',
            'amount' => '53',
            'price' => '1499.00',
            'category_id' => '5',
            ],
            ['image_path' => 'products/1caknIHAA3eknzbi6EjbYsn1bDZ9epBKJS9PU1i9.jpg',
            'name' => 'Monitor ACER Predator XB253QGW 24.5\"',
            'description' => 'Ekran: 24.5", 1920 x 1080px, IPS
            Częstotliwość odświeżania obrazu [Hz]: 280
            Czas reakcji matrycy [ms]: 1
            Jasność ekranu [cd/m2]: 400
            Proporcje ekranu: 16:9
            Złącza: Wyjście liniowe audio, USB x 2, HDMI x 2, DisplayPort x 1',
            'amount' => '431',
            'price' => '1599.99',
            'category_id' => '5',
            ],
        ];
        Product::insert($data);
    }
}

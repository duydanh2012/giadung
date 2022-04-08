<?php

namespace Database\Seeders;

use Platform\Base\Supports\BaseSeeder;
use Platform\Products\Models\Products;

class ProductSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('products');
        Products::truncate();
        
        $link = [
            'https://drive.google.com/file/d/1bQXdSct2Yp3_Ea-mrveyIVccQ9UqCvtA/preview',
            'https://drive.google.com/file/d/1_QgJKA11vmZG5a_HJb1kde9frTuqUdLq/preview',
            'https://drive.google.com/file/d/1DaXu2iq9jxaecezLA89QOHYSbSBmSgHI/preview',
            'https://drive.google.com/file/d/1Qh-H85iy82m34FmRK4Pq2WB_R5euj5pn/preview',
            'https://drive.google.com/file/d/1nN0D7jPlvDNDHOmmuz4tu3-scGNCIB2t/preview',
            'https://drive.google.com/file/d/1goxeSYBRWfmqQtFB8j6x4nQiy4Pa3wv1/preview',
            'https://drive.google.com/file/d/1A4h6-A4NSsfSUvNHCDQYRPVcpDu61fZp/preview',
            'https://drive.google.com/file/d/1IPA1Map-xBKoysFO253qo3SxCmboYUTB/preview',
            'https://drive.google.com/file/d/1sgdZMULXmw7SZustCgBsPyqo4WWk5fQF/preview',
            'https://drive.google.com/file/d/1dA1eXWlfbkFg1ajjiPXl5cLq1Lrp5cKj/preview',
            'https://drive.google.com/file/d/1s4flc8DgqtsSMB3fqRhzayuWywEnUKUF/preview',   
        ];

        for($i = 0; $i <= 10; $i++){
            Products::create([
                'name'         => 'Product ' . $i,
                'link'         =>  $link[$i],
                'image'        => 'products/clip-' . ($i + 1) . '.jpg',
            ]);
        }
    }
}
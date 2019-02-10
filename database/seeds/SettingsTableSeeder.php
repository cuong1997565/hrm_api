<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // const NORMAL = 0;
        // const PHONE  = 1;
        // const TEXT   = 2;
        // const EMAIL  = 3;
        // const URL    = 4;
        // const NUMBER = 5;

        $faker = Faker\Factory::create();

        DB::table('settings')->insert([
            [
                'name'  => 'Tên công ty',
                'slug'  => 'name',
                'type'  => 0,
                'value' => 'Công ty CP TM&DV Nguyên Hà'
            ],

            [
                'name'  => 'Địa chỉ',
                'slug'  => 'address',
                'type'  => 0,
                'value' => 'Tầng 3, số 102 phố Thái Thịnh, Đống Đa, Hà Nội'
            ],

            [
                'name'  => 'Email',
                'slug'  => 'email',
                'type'  => 3,
                'value' => 'info@nguyenhats.com'
            ],

            [
                'name'  => 'Số điện thoại',
                'slug'  => 'phone',
                'type'  => 1,
                'value' => '0938622888'
            ],

            [
                'name'  => 'Website',
                'slug'  => 'website',
                'type'  => 4,
                'value' => 'http://nguyenhats.com'
            ],

            [
                'name'  => 'Mô tả',
                'slug'  => 'description',
                'type'  => 2,
                'value' => 'Cung cấp dịch vụ phát triển ứng dụng website.'
            ],

            [
                'name'  => 'Thông tin',
                'slug'  => 'about',
                'type'  => 2,
                'value' => 'Chúng tôi là một công ty công nghệ chuyên cung cấp các giải pháp, dịch vụ nền tảng website. Với nhiều năm kinh nghiệm phát triển những hệ thống website E-Commerce lớn như Vatgia, Mytour và rất nhiều dự án website trải rộng khắp các lĩnh vực khiến chúng tôi tự tin vào khả năng đáp ứng của mình.'
            ],

            [
                'name'  => 'Facebook',
                'slug'  => 'facebook',
                'type'  => 4,
                'value' => 'facebook.com/nguyenhatech'
            ],

            [
                'name'  => 'Instagram',
                'slug'  => 'instagram',
                'type'  => 4,
                'value' => $faker->unique()->company
            ],

            [
                'name'  => 'Zalo',
                'slug'  => 'zalo',
                'type'  => 4,
                'value' => $faker->unique()->company
            ],

            [
                'name'  => 'Mã số thuế',
                'slug'  => 'tax_number',
                'type'  => 0,
                'value' => $faker->unique()->ean8
            ],            

            [
                'name'  => 'Ngân hàng',
                'slug'  => 'bank',
                'type'  => 0,
                'value' => 'Maritime Bank'
            ],
        ]);
    }
}

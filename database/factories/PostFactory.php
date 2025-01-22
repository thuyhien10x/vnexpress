<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
{
    $faker = FakerFactory::create('en_US'); // Đặt ngôn ngữ là tiếng Anh

    return [
        'title' => $faker->sentence, // Sử dụng $faker thay vì $this->faker
        'description' => $faker->text(250), // Giới hạn nội dung ở 250 ký tự
        'tag_id' => Tag::factory(), // Tự động tạo liên kết đến tag thông qua factory
    ];
}

}

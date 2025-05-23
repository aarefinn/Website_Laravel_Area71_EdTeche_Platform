<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'Area71 Academy Bundle',
            'description' => 'Area71 Academy offers a comprehensive Bundle Program featuring individual training courses on e-commerce platforms like Daraz and Amazon FBA, along with procurement and supply chain management. With a one-time payment, participants gain essential skills for financial independence. Join us to build a profitable business and craft your unique entrepreneurial identity.',
            'price' => 299.99,
            'image' => 'courses\Area71-Academy-Bundle.webp',  
        ]);

        Course::create([
            'title' => 'Amazon FBA Mastery',
            'description' => 'Area71 Academy offers the Amazon FBA A-Z Mastery Training Program, teaching you how to build a successful Amazon Private Label business. This training program covers everything from product research to scaling your brand. Enroll now for access to all course videos and start your journey to Amazon FBA success.',
            'price' => 149.99,
            'image' => 'courses/amazon-fba-mastery.webp',
        ]);

        Course::create([
            'title' => 'Daraz Seller Mastery',
            'description' => 'Area71 Academy offers the Daraz Seller Mastery Training Program to help you start selling on Bangladesh\'s largest e-commerce platform. Learn how to launch and grow a profitable online business on Daraz, gaining the skills for financial independence. Join now and thrive in Bangladesh\'s growing e-commerce market.',
            'price' => 19.99,
            'image' => 'courses\daraz.webp',
        ]);

        Course::create([
            'title' => 'Supply Chain Management',
            'description' => 'The Procurement & Supply Chain training program teaches you how to choose a business, source products, negotiate, and compare prices. Master these skills to start your own business or explore freelancing opportunities, helping other businesses optimize their supply chain and create new income streams.',
            'price' => 39.99,
            'image' => 'courses\Supply-Chain.webp',
        ]);
    }
}

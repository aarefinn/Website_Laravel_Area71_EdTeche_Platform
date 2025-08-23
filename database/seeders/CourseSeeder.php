<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $this->ensurePublicStorage();

        // slug, title, base filename
        $courses = [
            [
                'slug'  => 'amazon-fba-mastery',
                'title' => 'Amazon FBA A-Z Mastery',
                'base'  => 'amazon-fba-mastery',
                'price' => 15000,
                'duration' => 'Lifetime Access',
                'instructor' => 'Area71 Expert Team',
                'description' => <<<'DESC'
Unlock your Amazon FBA success with Area71 Academy's comprehensive mastery program! Learn everything from product research to PPC mastery.

Key Features:
• Live and recorded classes flexibility
• Lifetime access with one-time payment
• Complete A-Z Amazon FBA training
• Expert mentorship and support

What You'll Learn:
1. Product & Market Research
2. Supplier Research & Quality Control
3. Account & Listing Creation
4. PPC & Marketing Strategies
5. External Traffic & Social Media
6. Business Scaling Techniques
DESC
            ],
            [
                'slug'  => 'supply-chain-management',
                'title' => 'Supply Chain & Global Sourcing Mastery',
                'base'  => 'supply-chain',
                'price' => 10000,
                'duration' => 'Lifetime Access',
                'instructor' => 'Area71 Expert Team',
                'description' => <<<'DESC'
Master the art of global procurement and supply chain management with our comprehensive program.

Key Features:
• Flexible learning with live/recorded sessions
• Lifetime access to course materials
• Practical case studies
• Freelancing opportunity guidance

Course Modules:
1. Procurement Strategy Development
2. Sustainable Sourcing Practices
3. Logistics & Inventory Management
4. Supplier Relationship Management
5. Cost Optimization Techniques
6. Freelancing on Fiverr & Upwork
DESC
            ],
            [
                'slug'  => 'daraz-seller-mastery',
                'title' => 'Daraz Seller Mastery',
                'base'  => 'daraz',
                'price' => 5000,
                'duration' => 'Lifetime Access',
                'instructor' => 'Area71 Expert Team',
                'description' => <<<'DESC'
Transform your entrepreneurial journey with our Daraz Seller Mastery program - Your gateway to e-commerce success in Bangladesh.

Key Features:
• Live interactive classes
• Lifetime course access
• One-time payment structure
• Ongoing mentor support
• Algorithm mastery training

What You'll Master:
1. Proven Product Research Methods
2. Store Setup & Optimization
3. Listing Creation & SEO
4. Inventory Management
5. Sales Growth Strategies
6. Algorithm Understanding
DESC
            ],
        ];

        foreach ($courses as $c) {
            $ext = $this->detectExt($c['base']); // webp > png > jpg
            $photo = $ext ? "storage/courses/{$c['base']}.$ext" : null;

            Course::updateOrCreate(
                ['slug' => $c['slug']],
                [
                    'title'       => $c['title'],
                    'description' => $c['description'],
                    'price'       => $c['price'],
                    'discount'    => 0,
                    'duration'    => $c['duration'],
                    'instructor'  => $c['instructor'],
                    'photo'       => $photo,   // URL path served by public/storage
                    'status'      => 'active',
                ]
            );
        }
    }

    private function ensurePublicStorage(): void
    {
        // public/storage symlink
        if (!is_link(public_path('storage'))) {
            $this->command?->call('storage:link');
        }
        // make sure folder exists
        Storage::disk('public')->makeDirectory('courses');
    }

    private function detectExt(string $base): ?string
    {
        if (Storage::disk('public')->exists("courses/$base.webp")) return 'webp';
        if (Storage::disk('public')->exists("courses/$base.png"))  return 'png';
        if (Storage::disk('public')->exists("courses/$base.jpg"))  return 'jpg';
        return null;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\User;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Get the admin user or create one if it doesn't exist
        $adminUser = User::where('email', 'admin@example.com')->first();
        if (!$adminUser) {
            $adminUser = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('secret123'),
                'role' => 'admin',
            ]);
        }

        // Property 1: Luxury Villa for Sale
        Property::create([
            'user_id' => $adminUser->id,
            'title' => 'Luxury Beachfront Villa',
            'description' => 'Stunning 5-bedroom villa with panoramic sea views',
            'description_long' => 'This magnificent beachfront villa offers the ultimate luxury lifestyle with breathtaking ocean views from every room. The property features 5 spacious bedrooms, each with en-suite bathrooms, a large open-plan living area, and a gourmet kitchen equipped with top-of-the-line appliances. The villa includes a private infinity pool, expansive terrace areas perfect for entertaining, and direct beach access. Additional amenities include a home gym, wine cellar, and 3-car garage. Located in the prestigious Palm Jumeirah area.',
            'price' => 15000000, // 15 million AED
            'transaction_type' => 'sale',
            'property_type' => 'Villa',
            'bedrooms' => 5,
            'bathrooms' => 6,
            'area' => 8500, // sq ft
            'view' => 'Sea View',
            'status' => 'Available',
            'reference_no' => 'TX-VILLA-001',
            'location' => 'Palm Jumeirah, Dubai',
            'facilities' => 'Infinity Pool, Gym, Wine Cellar, 3-Car Garage, Terrace, Beach Access',
            'key_features' => 'Panoramic Sea Views, Private Beach Access, Infinity Pool, Modern Kitchen, Spacious Bedrooms',
            'amenities' => ['Swimming Pool', 'Gym', 'Parking', 'Garden', 'Balcony', 'Sea View', 'Beach Access'],
            'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3611.8!2d55.135!3d25.112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b8b8b8b8b8b%3A0x8b8b8b8b8b8b8b8b!2sPalm%20Jumeirah!5e0!3m2!1sen!2sae!4v1634567890123!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'company_name' => 'Texture Properties',
            'company_address' => 'Dubai Marina, Dubai, UAE',
            'company_phone' => '+971 4 3232455',
            'company_email' => 'info@textureproperties.com',
            'company_website' => 'https://textureproperties.com',
            'latitude' => 25.112,
            'longitude' => 55.135,
            'images' => [
                'property-1-1.jpg',
                'property-1-2.jpg',
                'property-1-3.jpg',
                'property-1-4.jpg',
                'property-1-5.jpg'
            ],
            'is_published' => true
        ]);

        // Property 2: Modern Apartment for Sale
        Property::create([
            'user_id' => $adminUser->id,
            'title' => 'Modern Downtown Apartment',
            'description' => 'Contemporary 3-bedroom apartment in Dubai Marina',
            'description_long' => 'Experience modern urban living in this beautifully designed 3-bedroom apartment located in the heart of Dubai Marina. The property features floor-to-ceiling windows offering stunning marina views, a sleek open-plan living and dining area, and a fully equipped modern kitchen. Each bedroom comes with built-in wardrobes and the master suite includes a walk-in closet and luxurious en-suite bathroom. The apartment includes a spacious balcony, underground parking, and access to world-class marina facilities including beaches, restaurants, and shopping.',
            'price' => 3500000, // 3.5 million AED
            'transaction_type' => 'sale',
            'property_type' => 'Apartment',
            'bedrooms' => 3,
            'bathrooms' => 3,
            'area' => 1850, // sq ft
            'view' => 'Marina View',
            'status' => 'Available',
            'reference_no' => 'TX-APART-002',
            'location' => 'Dubai Marina, Dubai',
            'facilities' => 'Balcony, Underground Parking, Built-in Wardrobes, Modern Kitchen, Marina Access',
            'key_features' => 'Marina Views, Modern Design, Balcony, Underground Parking, Built-in Appliances',
            'amenities' => ['Balcony', 'Parking', 'Gym', 'Swimming Pool', 'Security', 'Marina View', 'Shopping Mall'],
            'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.1!2d55.145!3d25.078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6c8c8c8c8c8c%3A0x9c9c9c9c9c9c9c9c!2sDubai%20Marina!5e0!3m2!1sen!2sae!4v1634567890123!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'company_name' => 'Texture Properties',
            'company_address' => 'Dubai Marina, Dubai, UAE',
            'company_phone' => '+971 4 3232455',
            'company_email' => 'info@textureproperties.com',
            'company_website' => 'https://textureproperties.com',
            'latitude' => 25.078,
            'longitude' => 55.145,
            'images' => [
                'property-2-1.jpg',
                'property-2-2.jpg',
                'property-2-3.jpg',
                'property-2-4.jpg',
                'property-2-5.jpg'
            ],
            'is_published' => true
        ]);

        // Property 3: Townhouse for Rent
        Property::create([
            'user_id' => $adminUser->id,
            'title' => 'Elegant Townhouse in Jumeirah',
            'description' => 'Spacious 4-bedroom townhouse available for rent',
            'description_long' => 'This elegant 4-bedroom townhouse offers comfortable family living in the prestigious Jumeirah area. The property features a large living room with high ceilings, a separate formal dining area, and a modern kitchen with granite countertops. Upstairs, you\'ll find four comfortable bedrooms including a master suite with walk-in closet and en-suite bathroom. The townhouse includes a private garden, 2-car parking, and is located close to schools, shopping centers, and public transport. Perfect for families seeking quality accommodation in a desirable neighborhood.',
            'price' => 180000, // 180,000 AED per year
            'transaction_type' => 'rent',
            'property_type' => 'House',
            'bedrooms' => 4,
            'bathrooms' => 4,
            'area' => 3200, // sq ft
            'view' => 'Garden View',
            'status' => 'Available',
            'reference_no' => 'TX-HOUSE-003',
            'location' => 'Jumeirah, Dubai',
            'facilities' => 'Private Garden, 2-Car Parking, Built-in Wardrobes, Modern Kitchen, High Ceilings',
            'key_features' => 'Private Garden, Family Friendly, Close to Schools, 2-Car Parking, Modern Amenities',
            'amenities' => ['Garden', 'Parking', 'Balcony', 'Security', 'Schools Nearby', 'Shopping Center', 'Public Transport'],
            'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3611.5!2d55.195!3d25.085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6d8d8d8d8d8d%3A0x8d8d8d8d8d8d8d8d!2sJumeirah!5e0!3m2!1sen!2sae!4v1634567890123!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'company_name' => 'Texture Properties',
            'company_address' => 'Dubai Marina, Dubai, UAE',
            'company_phone' => '+971 4 3232455',
            'company_email' => 'info@textureproperties.com',
            'company_website' => 'https://textureproperties.com',
            'latitude' => 25.085,
            'longitude' => 55.195,
            'images' => [
                'property-3-1.jpg',
                'property-3-2.jpg',
                'property-3-3.jpg',
                'property-3-4.jpg',
                'property-3-5.jpg'
            ],
            'is_published' => true
        ]);
    }
}

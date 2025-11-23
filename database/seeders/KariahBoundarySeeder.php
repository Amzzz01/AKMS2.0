<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KariahBoundary;
use App\Models\MosqueLocation;

class KariahBoundarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create the mosque location
        MosqueLocation::create([
            'name' => 'Masjid Al-Irsyad',
            'latitude' => 1.4556,  // Approximate coordinates for Telok Bagan
            'longitude' => 103.7645,
            'zoom_level' => 15
        ]);

        // Sample boundary data (you'll need to adjust these coordinates based on actual locations)
        // These are example polygons - replace with real coordinates
        
        $boundaries = [
            [
                'area_name' => 'Kampung Luar',
                'color' => '#3498db',
                'description' => 'Kawasan Kampung Luar',
                'boundary_polygon' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [103.760, 1.450],
                        [103.765, 1.450],
                        [103.765, 1.455],
                        [103.760, 1.455],
                        [103.760, 1.450]
                    ]]
                ])
            ],
            [
                'area_name' => 'Kampung Tengah',
                'color' => '#e74c3c',
                'description' => 'Kawasan Kampung Tengah',
                'boundary_polygon' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [103.765, 1.450],
                        [103.770, 1.450],
                        [103.770, 1.455],
                        [103.765, 1.455],
                        [103.765, 1.450]
                    ]]
                ])
            ],
            [
                'area_name' => 'Taman Bagan Indah',
                'color' => '#2ecc71',
                'description' => 'Kawasan Taman Bagan Indah',
                'boundary_polygon' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [103.760, 1.455],
                        [103.765, 1.455],
                        [103.765, 1.460],
                        [103.760, 1.460],
                        [103.760, 1.455]
                    ]]
                ])
            ],
            [
                'area_name' => 'Taman Bagan Permai',
                'color' => '#f39c12',
                'description' => 'Kawasan Taman Bagan Permai',
                'boundary_polygon' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [103.765, 1.455],
                        [103.770, 1.455],
                        [103.770, 1.460],
                        [103.765, 1.460],
                        [103.765, 1.455]
                    ]]
                ])
            ],
            [
                'area_name' => 'Taman Desa Kiara',
                'color' => '#9b59b6',
                'description' => 'Kawasan Taman Desa Kiara',
                'boundary_polygon' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [103.755, 1.450],
                        [103.760, 1.450],
                        [103.760, 1.455],
                        [103.755, 1.455],
                        [103.755, 1.450]
                    ]]
                ])
            ],
        ];

        foreach ($boundaries as $boundary) {
            KariahBoundary::create($boundary);
        }

        $this->command->info('Kariah boundaries seeded successfully!');
        $this->command->warn('Note: The boundary coordinates are sample data. Please update them with actual GPS coordinates through the admin interface.');
    }
}
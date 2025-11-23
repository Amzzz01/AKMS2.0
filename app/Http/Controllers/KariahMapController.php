<?php

namespace App\Http\Controllers;

use App\Models\KariahBoundary;
use App\Models\MosqueLocation;
use Illuminate\Http\Request;

class KariahMapController extends Controller
{
    /**
     * Display the map management interface (admin only)
     */
    public function adminIndex()
    {
        $boundaries = KariahBoundary::where('is_active', true)->get();
        $mosque = MosqueLocation::first();
        
        return view('admin.kariah-map.index', compact('boundaries', 'mosque'));
    }

    /**
     * Display the public map view
     */
    public function publicView()
    {
        $boundaries = KariahBoundary::where('is_active', true)->get();
        $mosque = MosqueLocation::first();
        
        return view('anak-kariah.map-view', compact('boundaries', 'mosque'));
    }

    /**
     * Store a new boundary
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'area_name' => 'required|string|max:255',
            'boundary_polygon' => 'required|json',
            'color' => 'required|string|max:7',
            'description' => 'nullable|string'
        ]);

        $boundary = KariahBoundary::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Boundary created successfully',
            'boundary' => $boundary
        ]);
    }

    /**
     * Update an existing boundary
     */
    public function update(Request $request, $id)
    {
        $boundary = KariahBoundary::findOrFail($id);

        $validated = $request->validate([
            'area_name' => 'sometimes|string|max:255',
            'boundary_polygon' => 'sometimes|json',
            'color' => 'sometimes|string|max:7',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean'
        ]);

        $boundary->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Boundary updated successfully',
            'boundary' => $boundary
        ]);
    }

    /**
     * Delete a boundary
     */
    public function destroy($id)
    {
        $boundary = KariahBoundary::findOrFail($id);
        $boundary->delete();

        return response()->json([
            'success' => true,
            'message' => 'Boundary deleted successfully'
        ]);
    }

    /**
     * Update mosque location
     */
    public function updateMosqueLocation(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'zoom_level' => 'required|integer|between:1,20'
        ]);

        $mosque = MosqueLocation::first();
        
        if (!$mosque) {
            $mosque = MosqueLocation::create($validated);
        } else {
            $mosque->update($validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'Mosque location updated successfully',
            'mosque' => $mosque
        ]);
    }

    /**
     * Get all boundaries as GeoJSON
     */
    public function getBoundariesGeoJSON()
    {
        $boundaries = KariahBoundary::where('is_active', true)->get();
        
        $features = $boundaries->map(function ($boundary) {
            return [
                'type' => 'Feature',
                'properties' => [
                    'id' => $boundary->id,
                    'area_name' => $boundary->area_name,
                    'color' => $boundary->color,
                    'description' => $boundary->description,
                ],
                'geometry' => json_decode($boundary->boundary_polygon)
            ];
        });

        $geoJSON = [
            'type' => 'FeatureCollection',
            'features' => $features
        ];

        return response()->json($geoJSON);
    }
}
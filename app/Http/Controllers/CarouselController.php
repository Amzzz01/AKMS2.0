<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController
{
    public function index()
    {
        $images = Carousel::all(); // Assuming you store images in the `carousels` table
        return view('admin.carousel_images', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'carousel' => 'required|string',
            'image'    => 'required|image|max:2048', // Adjust max size as needed
        ]);

        // Save the image in the appropriate folder (for example, in storage/app/public/carousels)
        $path = $request->file('image')->store('public/carousels');

        // Create a new record (adjust according to your database structure)
        Carousel::create([
            'file_path' => str_replace('public/', '', $path), // Store relative path
            'carousel_type' => $request->carousel, // assuming you have a field for the carousel type
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function destroy($id)
    {
        // Find the image by ID
        $image = Carousel::findOrFail($id);

        // Delete the image file from storage
        \Illuminate\Support\Facades\Storage::delete('public/' . $image->file_path);

        // Delete the image record from the database
        $image->delete();

        // Redirect back with a success message
        return redirect()->route('admin.carousel.images')->with('success', 'Image deleted successfully.');
    }


}

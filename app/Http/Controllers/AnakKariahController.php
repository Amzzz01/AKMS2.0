<?php

namespace App\Http\Controllers;

use App\Models\AnakKariah;
use Illuminate\Http\Request;

class AnakKariahController extends Controller
{
    /**
     * Show the form to register a new Anak Kariah record.
     * 
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('anak-kariah.view');
    }

    /**
     * Store the registration data for Anak Kariah.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => 'required|string|unique:anak_kariah',
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'areas' => 'required',
        ]);

        // Save the data to the database
        AnakKariah::create($request->all());

        // Flash a success message
        session()->flash('success', 'Pendaftaran berjaya, Terima Kasih!');

        // Redirect back to the registration form
        return redirect()->route('anak-kariah.view');
    }

    public function stored(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => 'required|string|unique:anak_kariah',
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'areas' => 'required',
        ]);

        // Save the data to the database
        AnakKariah::create($request->all());

        // Redirect back to the registration form
        return redirect()->route('anak-kariah.list')->with('success', 'Anak Kariah record added successfully.');
    }

    /**
     * Display the edit form for a specific Anak Kariah record.
     * 
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $anakKariah = AnakKariah::findOrFail($id);
        return view('anak-kariah.edit', compact('anakKariah'));
    }

    /**
     * Update an existing Anak Kariah record.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:14|unique:anak_kariah,ic_number,' . $id,
            'address' => 'required|string|max:500',
            'areas' => 'required|string|max:100',
            'phone_number' => 'required|string|regex:/^\d{10,14}$/',
            'date_of_birth' => 'required|date',
        ]);

        // Find the record by its ID
        $anakKariah = AnakKariah::findOrFail($id);

        // Update the record in the database
        $anakKariah->update([
            'full_name' => $request->input('full_name'),
            'ic_number' => $request->input('ic_number'),
            'address' => $request->input('address'),
            'areas' => $request->input('areas'),
            'phone_number' => $request->input('phone_number'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        // Redirect back with a success message
        return redirect()->route('anak-kariah.list')->with('success', 'Maklumat Anak Kariah berjaya dikemaskini.');
    }

    /**
     * Delete a specific Anak Kariah record.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $anakKariah = AnakKariah::findOrFail($id);
        $anakKariah->delete(); // This sets the deleted_at column instead of deleting the record permanently.
    
        return redirect()->route('anak-kariah.index')->with('success', 'Anak Kariah record has been removed from view.');
    }  
    /**
     * Soft delete a specific Anak Kariah record.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $anakKariah = AnakKariah::findOrFail($id); // Find the record by ID
        $anakKariah->delete(); // Soft delete the record (sets the deleted_at column)

        return redirect()->route('anak-kariah.list')->with('success', 'Record has been removed.');
    }

    
    /**
     * Restore a previously deleted Anak Kariah record.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $anakKariah = AnakKariah::withTrashed()->findOrFail($id);
        $anakKariah->restore(); // This removes the deleted_at value.

        return redirect()->route('anak-kariah.index')->with('success', 'Anak Kariah record has been restored.');
    }

    /**
     * Display a list of Anak Kariah records with search and sorting functionality.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = AnakKariah::query();

        // Handle search functionality
        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('ic_number', 'like', '%' . $request->search . '%');
        }

        // Handle sorting functionality
        $validSortColumns = ['full_name', 'phone_number', 'ic_number', 'gender', 'date_of_birth', 'address', 'areas'];
        if ($request->filled('sort') && $request->filled('direction')) {
            if (in_array($request->sort, $validSortColumns)) {
                $query->orderBy($request->sort, $request->direction);
            }
        } else {
            $query->orderBy('full_name'); // Default sorting
        }


        // Check for 'view=all' parameter
        if ($request->has('view') && $request->view === 'all') {
            $anakKariahList = $query->get(); // Fetch all records
        } else {
        $anakKariahList = $query->paginate(10); // Default paginated view
        }

        // Return the view with the list of records
        return view('anak-kariah.list', compact('anakKariahList'));

 

    }

    public function create()
    {
        return view('anak-kariah.create');
    }

    /**
     * Change the status of a specific Anak Kariah record to 'inactive'.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleStatus($id)
    {
        $anakKariah = AnakKariah::findOrFail($id);
    
        // Toggle the status
        $anakKariah->status = $anakKariah->status === 'active' ? 'inactive' : 'active';
        $anakKariah->save();
    
        // Redirect with a success message
        $message = $anakKariah->status === 'active' 
            ? 'Record reactivated successfully!' 
            : 'Record deactivated successfully!';
        
        return redirect()->route('anak-kariah.list')->with('success', $message);
    }



    

}

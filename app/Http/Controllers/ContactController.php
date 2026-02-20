<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index', ['contacts' => Contact::all()]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'contact' => 'required|string|size:9|unique:contacts',
            'email' => 'required|email|unique:contacts'
        ]);

        Contact::create($validated);
        return redirect()->route('contacts.index')->with('success', 'Contacto criado com sucesso.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'contact' => ['required', 'string', 'size:9', Rule::unique('contacts')->ignore($contact->id)],
            'email' => ['required', 'email', Rule::unique('contacts')->ignore($contact->id)]
        ]);

        $contact->update($validated);
        return redirect()->route('contacts.index')->with('success', 'Contacto atualizado com sucesso.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contacto eliminado com sucesso.');
    }
}

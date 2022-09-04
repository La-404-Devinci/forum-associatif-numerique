<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use App\Models\Association;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('association.index', [
            'categories' => Category::with('associations')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function show(Association $association)
    {
        return view('association.show', [
            'assocition' => $association,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function edit(Association $association)
    {
        return view('association.edit', [
            'association' => $association,
            'categories' => Category::findAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Association $association)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email'],
            'logo' => ['nullable'],
            'video' => ['nullable',],
            'status' => ['nullable', 'string'],
            'catchphrase' => ['required', 'string'],
            'description' => ['required', 'string'],
            'profile_type' => ['required', 'string'],
            'category_id' => ['required', 'int'],
            'facebook' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'youtube' => ['nullable', 'string'],
            'twitch' => ['nullable', 'string'],
            'discord' => ['nullable', 'string'],
            'tiktok' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'others' => ['nullable', 'string'],
            'form' => ['nullable', 'string'],
            'projects' => ['required', 'string'],
            'thumbnail' => ['nullable', 'int'],
            'images' => ['nullable', 'array'],
        ]);

        try {
            // Update global association field
            $association->update($request->all());

            // Save logo and video
            $association->logo = UploadHelper::uploadImage($request->logo, $association);
            $association->video = UploadHelper::uploadVideo($request->video, $association);

            if ($request->images) {
                $images = new Collection();
                // Foreach images sent, upload it to storage system and save it's id
                foreach ($request->images as $image) {
                    $images->push(UploadHelper::uploadImage($image, $association));
                }
                // Attach in pivot table $images
                $association->files()->attach($images);
            }

        } catch (Exception $e) {
            // TODO - Make exception return or save it in error table
        }

        return redirect()->route('association.edit', $association);
    }
}

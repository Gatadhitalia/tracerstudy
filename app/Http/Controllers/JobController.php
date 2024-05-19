<?php

namespace App\Http\Controllers;

//import Model "job
use App\Models\job;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class jobController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $jobs = job::latest()->paginate(5);

        //render view with posts
        return view('job.index', compact('jobs'));
    }
     /**
     * create
     *
     * @return View
     */

    public function create(): View
    {
        return view('job.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_job'=> 'required',
            'periode_masuk_job'=> 'required',
            'periode_keluar_job'=> 'required',
            'alamat_job'=> 'required',
            'prov_job'=> 'required',
            'kota_job'=> 'required',
            'link_job'=> 'required',
            'jns_job'=> 'required',
            'jabatan_job'=> 'required',
            'deskripsi_job'=> 'required'
        ]);

        //create post
        job::create([
            'nama_job' => $request->nama_job,
            'periode_masuk_job' => $request->periode_masuk_job,
            'periode_keluar_job' => $request->periode_keluar_job,
            'alamat_job' => $request->alamat_job,
            'prov_job' => $request->prov_job,
            'kota_job' => $request->kota_job,
            'link_job' => $request->link_job,
            'jns_job' => $request->jns_job,
            'jabatan_job' => $request->jabatan_job,
            'deskripsi_job' => $request->deskripsi_job
        ]);

        //redirect to index
        return redirect()->route('job.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $job = job::findOrFail($id);

        //render view with post
        return view('job.show', compact('job'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $job = job::findOrFail($id);

        //render view with post
        return view('job.edit', compact('job'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_job'=> 'required',
            'periode_masuk_job'=> 'required',
            'periode_keluar_job'=> 'required',
            'alamat_job'=> 'required',
            'prov_job'=> 'required',
            'kota_job'=> 'required',
            'link_job'=> 'required',
            'jns_job'=> 'required',
            'jabatan_job'=> 'required',
            'deskripsi_job'=> 'required'
        ]);

        //get post by ID
        $post = job::findOrFail($id);
            //update post without image
            $post->update([
            'nama_job' => $request->nama_job,
            'periode_masuk_job' => $request->periode_masuk_job,
            'periode_keluar_job' => $request->periode_keluar_job,
            'alamat_job' => $request->alamat_job,
            'prov_job' => $request->prov_job,
            'kota_job' => $request->kota_job,
            'link_job' => $request->link_job,
            'jns_job' => $request->jns_job,
            'jabatan_job' => $request->jabatan_job,
            'deskripsi_job' => $request->deskripsi_job
        ]);

        //redirect to index
        return redirect()->route('job.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $job = job::findOrFail($id);
        
        //delete post
        $job->delete();

        //redirect to index
        return redirect()->route('job.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
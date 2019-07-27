<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari'))
        {
            $data_siswa = \App\Siswa::where('nama','LIKE','%'.$request->cari.'%')->get();
        } else
        {
            $data_siswa = \App\Siswa::all();
        }
        return view('master/siswa/siswa', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'gambar' => 'mimes:jpg,png',
        ]);
        //insert ke tabel users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //insert ke tabel siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if($request->hasFile('gambar'))
        {
            $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('tambah', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('master/siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('gambar'))
        {
            $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('edit','Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('hapus','Data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        // menyiapkan data untuk chart
        $categories = [];
        $data = [];
        foreach($matapelajaran as $mp)
        {
            if($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first())
            {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        return view('master/siswa/profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran, 'categories' => $categories, 'data' => $data]);
    }

    public function addnilai(Request $request, $id_siswa)
    {
        $siswa = \App\Siswa::find($id_siswa);
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists())
        {
            return redirect('siswa/'.$id_siswa.'/profile')->with('error','Data nilai mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$id_siswa.'/profile')->with('tambah','Data nilai berhasil diinputkan');
    }

    public function deletenilai($id_siswa, $id_mapel)
    {
        $siswa = \App\Siswa::find($id_siswa);
        $siswa->mapel()->detach($id_mapel);
        return redirect()->back()->with('hapus','Data nilai berhasil dihapus');
    }
}
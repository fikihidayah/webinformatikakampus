<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRolesRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class SettingController extends Controller
{
    // inforamsi
    public function informasi()
    {
        return view('admin.settings.info', [
            'title' => 'Informasi Website',
            'subtitle' => 'Edit',
            'data' => Setting::first()
        ]);
    }

    public function update(UpdateRolesRequest $request, Setting $settings)
    {
        $validated = $request->validated();

        if ($validated) {
            if ($file = $request->file('favicon')) {
                $fileName = $file->getClientOriginalName();
                if ($oldFile = $settings->favicon) {
                    unlink(public_path('web/img/favicon/' . $oldFile));
                }
                $file->storeAs('favicon', $fileName, 'web');
                $validated['favicon'] = $fileName;
            }

            if ($file = $request->file('icon')) {
                $fileName = $file->getClientOriginalName();
                if ($oldFile = $settings->icon) {
                    $filePath = public_path('web/img/icon/' . $oldFile);
                    if (file_exists($filePath)) {
                        unlink(public_path('web/img/icon/' . $oldFile));
                    }
                }
                $file->storeAs('icon', $fileName, 'web');
                $validated['icon'] = $fileName;
            }

            Setting::where('id', $settings->id)->update($validated);

            return back()->with('success', 'Informasi Website Berhasil diubah!');
        }
    }

    public function getMaps($latitude, $longitude)
    {
        return view('admin.settings.maps', ['lt' => $latitude, 'lg' => $longitude]);
    }

    public function home()
    {
        return view('admin.settings.home', [
            'title' => 'Pengaturan Halaman Website | Home',
            'subtitle' => 'Edit',
            'slide' => Setting::getHomeSlide(),
            'selamat' => Setting::getHomeSelamat(),
            'testi' => Setting::getHomeTestimoni()
        ]);
    }

    // selamat datang
    public function update_slm(Request $request, int $id)
    {
        $validation = $this->validate($request, [
            'id_embed' => 'required',
            'isi' => 'required'
        ], [], [
            'id_embed' => 'ID Embed'
        ]);


        if ($validation) {
            Setting::updateHomeSelamat($id, $validation);

            return back()->with('success', 'Berhasil mengubah tampilan selamat datang!');
        }
    }

    // testimoni
    public function create_testi(Request $request)
    {
        $validation = $this->validateWithBag('testi', $request, [
            'nama' => 'required|max:100',
            'isi_testi' => 'required|max:100',
            'kerja' => 'required',
            'image' => 'file|max:512|mimes:png,jpg,jpeg|required|dimensions:ratio=1/1',
        ], [], ['isi_testi' => 'Isi Testi', 'kerja' => 'Kerja']);


        if ($validation) {
            if ($file = $request->file('image')) {
                $fileName = $file->hashName();
                $file->store('testimoni', 'web');
                $validation['image'] = $fileName;
            }


            Setting::createHomeTesti($validation);

            return back()->with('success', 'Berhasil menambahkan testimoni!');
        }
    }

    public function edit_testi(int $id)
    {
        return view('admin.settings.edit_testimoni', [
            'title' => 'Pengaturan Halaman Website | Home',
            'subtitle' => 'Edit Testimoni',
            'testi' => Setting::getHomeTestimoni($id)
        ]);
    }

    public function update_testi(Request $request, int $id)
    {
        $testi = Setting::getHomeTestimoni($id);
        $validated = $this->validate($request, [
            'nama' => 'required|max:100',
            'isi_testi' => 'required|max:100',
            'kerja' => 'required',
            'image' => 'file|max:512|mimes:png,jpg,jpeg|dimensions:ratio=1/1',
        ], []);

        if ($validated) {
            if ($file = $request->file('image')) {
                $path = public_path('web/img/testimoni/' . $testi->image);
                del_file($path);
                $fileName = $file->hashName();
                $file->store('testimoni', 'web');
                $validated['image'] = $fileName;
            }


            Setting::updateHomeTesti($id, $validated);

            return back()->with('success', 'Berhasil mengubah testimoni!');
        }
    }

    // slide
    public function create_slide(Request $request)
    {
        $validated = $this->validate($request, ['image' => 'file|max:1024|mimes:png,jpg,jpeg|required']);

        if ($validated) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->store('slideshow-home', 'web');
            $validated['image'] = $fileName;

            Setting::createHomeSlide($validated);

            return back()->with('success', 'Berhasil menambahkan slide image!');
        }
    }

    public function edit_slide(int $id)
    {
        return view('admin.settings.edit_slide', [
            'title' => 'Pengaturan Halaman Website | Home',
            'subtitle' => 'Edit Slide',
            'slide' => Setting::getHomeSlide($id)
        ]);
    }

    public function update_slide(Request $request, int $id)
    {
        $validated = $this->validate($request, ['image' => 'file|max:1024|mimes:png,jpg,jpeg|required']);
        $old_image = Setting::getHomeSlide($id)->image;
        if ($validated) {
            $file = $request->file('image');
            $fileName = $file->hashName();

            $path = public_path('web/img/slideshow-home/' . $old_image->image);
            del_file($path);
            $file->store('slideshow-home', 'web');
            $validated['image'] = $fileName;

            Setting::updateHomeSlide($id, $validated);

            return back()->with('success', 'Berhasil mengubah slide image!');
        }
    }

    public function delete_testi(int $id)
    {
        $old_image = Setting::getHomeTestimoni($id);
        $path = public_path('web/img/testimoni/' . $old_image->image);
        del_file($path);

        Setting::deleteHomeTesti($id);
        return redirect('/setting/home')->with('success', 'Berhasil menghapus Testimoni!');
    }

    public function delete_slide(int $id)
    {
        $old_image = Setting::getHomeSlide($id);
        $path = public_path('web/img/slideshow-home/' . $old_image->image);
        del_file($path);

        Setting::deleteHomeSlide($id);
        return redirect('/setting/home')->with('success', 'Berhasil menghapus Slide image!');
    }
}

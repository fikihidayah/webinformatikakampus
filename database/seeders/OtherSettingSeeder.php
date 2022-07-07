<?php

namespace Database\Seeders;

use App\Models\OtherSetting;
use Illuminate\Database\Seeder;

class OtherSettingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    OtherSetting::create([
      'modul' => 'profil',
      'halaman' => 'Profil',
      'slug' => 'profil',
      'isi' => '<p><span>&#8220;</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sint alias in, ducimus
                autem, nulla fugit corporis dignissimos laudantium ab necessitatibus explicabo similique aut omnis facere
                vitae est eos cupiditate.<span>&#8221;</span></p>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi facilis, unde ratione iste dolor
                distinctio fugiat quisquam sint explicabo magnam corporis illo consectetur repudiandae? Voluptates
                consectetur molestiae maiores fuga minus, sunt dignissimos voluptatem corrupti quidem at eligendi totam
                praesentium tempore illum aliquam unde incidunt expedita, nisi provident ullam ad dolore. Eaque, labore
                porro. Rerum, a dolores! Error excepturi aspernatur vel minus doloribus sit deserunt voluptas iste maxime
                repudiandae neque dolor amet natus dicta, dolorum animi ducimus maiores, delectus autem magni
                perspiciatis. Perferendis eum odio fugiat quisquam, nemo officiis sit. Tempora officia explicabo atque
                consequatur dolor aliquam dolorem est delectus. Non.</p>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur rerum, officia sapiente, quis ipsum non
                consequuntur temporibus eaque ullam voluptas est laudantium sit aspernatur modi? Autem atque placeat,
                repudiandae et cupiditate provident a reiciendis voluptate assumenda odio accusamus expedita magnam illum
                veritatis laudantium ullam dolor ipsa eligendi molestias quo perspiciatis.</p>'
    ]);

    OtherSetting::create([
      'modul' => 'profil',
      'halaman' => 'Sambutan Ketua Jurusan',
      'slug' => 'sambutan-ketua-jurusan',
      'isi' => '<p><img class="img-fluid float-start pe-4" src="/web/assets/app/img/sambutan/okta.veza.jpg" alt="" width="224" height="200" /></p>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo maxime magni autem repellendus harum. Iste cupiditate sapiente obcaecati natus facere, illo, cum veritatis eveniet facilis quasi minima veniam ipsum pariatur.</p>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti facere in nulla placeat inventore sit soluta, cupiditate incidunt esse. Deserunt earum harum rem accusantium asperiores quod impedit tempore exercitationem aspernatur soluta facere, laborum commodi. Soluta facilis, eos nisi, accusamus quo consectetur voluptate odit quibusdam, iure voluptatibus distinctio sed ex? Labore.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate tempora quos unde, nam nesciunt facere recusandae nostrum dolorem eaque quidem id, facilis laboriosam temporibus? Architecto repellendus tenetur quam vero! At esse, voluptatum itaque quis, eius error in dolorum quos illo debitis blanditiis odio provident fuga maiores, omnis laborum nemo asperiores necessitatibus excepturi. Rerum dolores aliquid tempore harum mollitia accusamus ab, ad placeat exercitationem veritatis, porro libero. Ipsa, quae rerum iste numquam hic et qui molestiae dolore excepturi corrupti quaerat voluptatibus distinctio placeat labore ab nesciunt eum odit sapiente molestias voluptatum illo a magni animi praesentium? Necessitatibus vero nesciunt nam hic!</p>'
    ]);

    OtherSetting::create([
      'modul' => 'profil',
      'halaman' => 'Visi dan Misi',
      'slug' => 'visi-misi',
      'isi' => '<h5 class="text-black fw-bold">Visi</h5>

                <div class="visi-wrapper mb-4">
                  <p><span>&#8220;</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sint alias in, ducimus
                    autem, nulla fugit corporis dignissimos laudantium ab necessitatibus explicabo similique aut omnis facere
                    vitae est eos cupiditate.<span>&#8221;</span> </p>
                </div>
      
                <h5 class="text-black fw-bold">Misi</h5>
      
                <div class="misi-wrapper mb-4">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta minus dolorum aliquid veritatis quidem
                    repellat reprehenderit rerum unde eum cum impedit iure ab exercitationem quod consectetur porro, quis,
                    delectus molestiae! : </p>
                  <ol>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, eaque.</li>
                    <li>Ex dicta aut alias dolores nemo, sint voluptatem animi repellendus?</li>
                    <li>Quae possimus consectetur sint voluptates ad enim voluptatum temporibus aliquid.</li>
                  </ol>
                </div>
      
                <h5 class="text-black fw-bold">Tujuan</h5>
      
                <div class="tujuan-wrapper mb-4">
                  <ol>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, eaque.</li>
                    <li>Ex dicta aut alias dolores nemo, sint voluptatem animi repellendus?</li>
                  </ol>
                </div>'
    ]);

    OtherSetting::create([
      'modul' => 'profil',
      'slug' => 'struktur-organisasi',
      'halaman' => 'Struktur Organisasi',
      'isi' => '<img src="/web/assets/app/img/ig/1.jpg" alt="" class="img-fluid">'
    ]);

    OtherSetting::create([
      'modul' => 'program studi',
      'slug' => 'sambutan-kaprodi-s1',
      'halaman' => 'Sambutan Kapordi S1',
      'isi' => '<div class="thumb-foto-wrapper float-start">
            <div class="thumb-foto">
              <img src="/web/assets/app/img/sambutan/okta.veza.jpg" alt="" class="img-fluid">
              <div class="nama-kaprodi"><i>Okta Veza M.Kom</i></div>
            </div>
          </div>
          <div class="deskripsi-info">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo maxime magni autem repellendus harum.
              Iste
              cupiditate sapiente obcaecati natus facere, illo, cum veritatis eveniet facilis quasi minima veniam
              ipsum
              pariatur.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti facere in nulla placeat inventore
              sit
              soluta, cupiditate incidunt esse. Deserunt earum harum rem accusantium asperiores quod impedit tempore
              exercitationem aspernatur soluta facere, laborum commodi. Soluta facilis, eos nisi, accusamus quo
              consectetur voluptate odit quibusdam, iure voluptatibus distinctio sed ex? Labore.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate tempora quos unde, nam nesciunt
              facere
              recusandae nostrum dolorem eaque quidem id, facilis laboriosam temporibus? Architecto repellendus
              tenetur
              quam vero! At esse, voluptatum itaque quis, eius error in dolorum quos illo debitis blanditiis odio
              provident fuga maiores, omnis laborum nemo asperiores necessitatibus excepturi. Rerum dolores aliquid
              tempore harum mollitia accusamus ab, ad placeat exercitationem veritatis, porro libero. Ipsa, quae rerum
              iste numquam hic et qui molestiae dolore excepturi corrupti quaerat voluptatibus distinctio placeat
              labore
              ab nesciunt eum odit sapiente molestias voluptatum illo a magni animi praesentium? Necessitatibus vero
              nesciunt nam hic!</p>
          </div>'
    ]);

    OtherSetting::create([
      'modul' => 'program studi',
      'slug' => 'profil-lulusan',
      'halaman' => 'Profil Lulusan',
      'isi' => '<div class="row justify-content-between align-items-center pb-4">

            <div class="col-md-5 text-center text-lg-center">
              <img src="/web/assets/app/img/sarjana/Diagram-Solution-Enabler-1030x1030.png" alt="" class="img-fluid">
            </div>
  
            <div class="col-md-7 mt-4 mt-sm-0 ps-sm-5">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id veritatis inventore sequi illo voluptas
                aliquam cumque? Officia corporis sunt doloribus ratione minus voluptas ipsa laboriosam.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita dolores deleniti possimus soluta!
                Expedita quo possimus in atque debitis quaerat repellat excepturi tempore nihil, voluptas exercitationem
                odio</p>
            </div>
  
          </div>'
    ]);
  }
}

<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Seeder;

/**
 * Class CategoriesTableSeeder
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = self::defaultCategories();
        foreach ($categories as $index => $category) {
            $category =  Category::updateOrCreate([
                'parent_id' => 1,
                'order_column' => $index,
                'title' => $category['title'],
                'subtitle' => isset($category['subtitle']) ? $category['subtitle'] : $category['title'],
                'description' => $category['description']
            ]);
            $category->image()->save(factory(\App\Models\Media::class)->make());
        }

        if (App::environment(['local', 'staging', 'testing'])) {
            factory(Category::class, 30)->create()->each(function ($cat) {
                $cat->image()->save(factory(Media::class)->make());
            });
        }
    }

    protected static function defaultCategories()
    {
        return [
            [
                'title' => 'page',
                'description' => 'Page adalah sumber dokumen atau informasi yang sesuai untuk Waring Wera Wanua dan dapat diakses melalui peramban web dan ditampilkan pada monitor atau perangkat seluler.',
            ],
            [
                'title' => 'book',
                'description' => 'kumpulan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan, gambar, atau tempelan. Setiap sisi dari sebuah lembaran kertas pada buku disebut sebuah halaman.',
            ],
            [
                'title' => 'video',
                'description' => ' teknologi pengiriman sinyal elektronik dari suatu gambar bergerak. Aplikasi umum dari sinyal video adalah televisi, tetapi dia dapat juga digunakan dalam aplikasi lain di dalam bidang teknik, saintifik, produksi dan keamanan.',
            ],
            [
                'title' => 'blog',
                'description' => 'Blog adalah salah satu jenis website yang kontennya berisi pemikiran satu atau beberapa penulis dan memiliki urutan posting secara kronologis (dari konten terbaru ke konten terlama).',
            ],
            [
                'title' => 'Docker',
                'description' => 'Docker is a set of platform as a service products that uses OS-level virtualization to deliver software in packages called containers. Containers are isolated from one another and bundle their own software, libraries and configuration files; they can communicate with each other through well-defined channels. ',
            ],
            [
                'title' => 'Git',
                'description' => 'Git is a distributed version-control system for tracking changes in source code during software development. It is designed for coordinating work among programmers, but it can be used to track changes in any set of files. Its goals include speed, data integrity, and support for distributed, non-linear workflows.',
            ],
            [
                'title' => 'GitHub',
                'description' => 'GitHub adalah manajemen proyek dan sistem versioning code sekaligus platform jaringan sosial yang dirancang khusus bagi para developer.',
            ],
            [
                'title' => 'GitLab',
                'description' => 'GitLab adalah sebuah manajer repositori Git berbasis web dengan fitur wiki dan pelacakan masalah, menggunakan lisensi sumber terbuka, dikembangkan oleh GitLab Inc. Perangkat lunak ini ditulis oleh Dmitriy Zaporozhets dan Valery Sizov dari Ukraina. Kode yang ditulis adalah Ruby.',
            ],
            [
                'title' => 'Javascript',
                'description' => 'JavaScript adalah bahasa pemograman yang digunakan untuk menambahkan fitur interaktif pada website anda, seperti ketika ingin membuat game, melakukan perubahan ketika mengklik tombol, efek dinamik, animasi, dan masih banyak lagi. ',
            ],
            [
                'title' => 'PHP',
                'subtile' => 'PHP: Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML',
                'description' => 'PHP Adalah bahasa scripting server-side, Bahasa pemrograman yang digunakan untuk mengembangkan situs web statis atau situs web dinamis atau aplikasi Web. PHP singkatan dari Hypertext Pre-processor, yang sebelumnya disebut Personal Home Pages.',
            ],
            [
                'title' => 'Python',
                'description' => 'Python adalah bahasa pemrograman interpretatif multiguna dengan filosofi perancangan yang berfokus pada tingkat keterbacaan kode.',
            ],
            [
                'title' => 'Sass',
                'description' => 'SASS merupakan singkatan dari Syntactically Awesome Style Sheets. SASS adalah sebuah bahasa pra-prosesor (preprocessor) untuk CSS.',
            ],

        ];
//        return ['book', 'video', 'blog', 'test', 'docker', 'git', 'code', 'deploy', 'monitor', 'plan', 'release', 'Continuous Integration', 'Continuous Delivery', 'Continuous Deployment', 'server', 'Internet Of Think', 'Mobile Apps', 'Development', 'Production', 'Design', 'Business', 'testing', 'seeding', 'PHP', 'Javascript', 'CSS', 'SCSS', 'LESS', 'HTML', 'Unit Testing', 'Gitlab', 'Github'];
    }
}

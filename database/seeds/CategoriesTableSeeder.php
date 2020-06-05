<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategoriesTableSeeder
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Category $category
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @return void
     */
    public function run(Category $category)
    {
        $categories = self::defaultCategories();

        foreach ($categories as $index => $content) {
            $image = storage_path("app/public/img/categories/{$content['image']}");

            $category->updateOrCreate([
                'parent_id' => 1,
                'order_column' => $index,
                'title' => $content['title'],
                'subtitle' => isset($content['subtitle']) ? $content['subtitle'] : $content['title'],
                'description' => $content['description']
            ])->addMedia($image)
                ->usingName($content['title'])
                ->preservingOriginal()
                ->withResponsiveImages()
                ->toMediaCollection('images');
        }
    }

    /**
     * @return string[][]
     */
    protected static function defaultCategories(): array
    {
        return [
            [
                'title' => 'page',
                'description' => 'Page adalah sumber dokumen atau informasi yang sesuai untuk Waring Wera Wanua dan dapat diakses melalui peramban web dan ditampilkan pada monitor atau perangkat seluler.',
                'image' => 'page.png'
            ],
            [
                'title' => 'book',
                'description' => 'kumpulan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan, gambar, atau tempelan. Setiap sisi dari sebuah lembaran kertas pada buku disebut sebuah halaman.',
                'image' => 'book.jpg'
            ],
            [
                'title' => 'video',
                'description' => ' teknologi pengiriman sinyal elektronik dari suatu gambar bergerak. Aplikasi umum dari sinyal video adalah televisi, tetapi dia dapat juga digunakan dalam aplikasi lain di dalam bidang teknik, saintifik, produksi dan keamanan.',
                'image' => 'video.jpg'
            ],
            [
                'title' => 'blog',
                'description' => 'Blog adalah salah satu jenis website yang kontennya berisi pemikiran satu atau beberapa penulis dan memiliki urutan posting secara kronologis (dari konten terbaru ke konten terlama).',
                'image' => 'blog.jpg'
            ],
            [
                'title' => 'Docker',
                'description' => 'Docker is a set of platform as a service products that uses OS-level virtualization to deliver software in packages called containers. Containers are isolated from one another and bundle their own software, libraries and configuration files; they can communicate with each other through well-defined channels. ',
                'image' => 'docker.jpg'
            ],
            [
                'title' => 'Git',
                'description' => 'Git is a distributed version-control system for tracking changes in source code during software development. It is designed for coordinating work among programmers, but it can be used to track changes in any set of files. Its goals include speed, data integrity, and support for distributed, non-linear workflows.',
                'image' => 'git.png'
            ],
            [
                'title' => 'GitHub',
                'description' => 'GitHub adalah manajemen proyek dan sistem versioning code sekaligus platform jaringan sosial yang dirancang khusus bagi para developer.',
                'image' => 'github.png'
            ],
            [
                'title' => 'GitLab',
                'description' => 'GitLab adalah sebuah manajer repositori Git berbasis web dengan fitur wiki dan pelacakan masalah, menggunakan lisensi sumber terbuka, dikembangkan oleh GitLab Inc. Perangkat lunak ini ditulis oleh Dmitriy Zaporozhets dan Valery Sizov dari Ukraina. Kode yang ditulis adalah Ruby.',
                'image' => 'gitlab.png'
            ],
            [
                'title' => 'Javascript',
                'description' => 'JavaScript adalah bahasa pemograman yang digunakan untuk menambahkan fitur interaktif pada website anda, seperti ketika ingin membuat game, melakukan perubahan ketika mengklik tombol, efek dinamik, animasi, dan masih banyak lagi. ',
                'image' => 'javascript.png'
            ],
            [
                'title' => 'PHP',
                'subtile' => 'PHP: Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML',
                'description' => 'PHP Adalah bahasa scripting server-side, Bahasa pemrograman yang digunakan untuk mengembangkan situs web statis atau situs web dinamis atau aplikasi Web. PHP singkatan dari Hypertext Pre-processor, yang sebelumnya disebut Personal Home Pages.',
                'image' => 'php.jpg'
            ],
            [
                'title' => 'Python',
                'description' => 'Python adalah bahasa pemrograman interpretatif multiguna dengan filosofi perancangan yang berfokus pada tingkat keterbacaan kode.',
                'image' => 'python.png'
            ],
            [
                'title' => 'Sass',
                'description' => 'SASS merupakan singkatan dari Syntactically Awesome Style Sheets. SASS adalah sebuah bahasa pra-prosesor (preprocessor) untuk CSS.',
                'image' => 'sass.jpg'
            ],
            [
                'title' => 'Laravel',
                'description' => 'Laravel adalah kerangka kerja aplikasi web berbasis PHP yang sumber terbuka, menggunakan konsep Model-View-Controller. Laravel berada dibawah lisensi MIT, dengan menggunakan GitHub sebagai tempat berbagi kode.',
                'image' => 'laravel.jpg'
            ],
            [
                'title' => 'O2system',
                'description' => 'O2System adalah sebuah kerangka kerja yang menyediakan struktur dasar yang tertata rapih sesuai dengan peruntukkannya. O2System didesain untuk dapat memberikan hasil render yang sangat cepat dengan penggunaan memory yang sangat kecil.',
                'image' => 'o2system.png'
            ]

        ];
//        return ['book', 'video', 'blog', 'test', 'docker', 'git', 'code', 'deploy', 'monitor', 'plan', 'release', 'Continuous Integration', 'Continuous Delivery', 'Continuous Deployment', 'server', 'Internet Of Think', 'Mobile Apps', 'Development', 'Production', 'Design', 'Business', 'testing', 'seeding', 'PHP', 'Javascript', 'CSS', 'SCSS', 'LESS', 'HTML', 'Unit Testing', 'Gitlab', 'Github'];
    }
}

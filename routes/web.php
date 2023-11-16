<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home',[
        "title" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "Luthfan",
        "email" => "fadhlyluthfan@gmail.com",
        "image" => "luthfan.jpg"
    ]);
});



Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "judul post pertama",
            "slug" => "judul-post-pertama",
            "autor" => "Luthfan",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere adipisci impedit incidunt, repellendus, fuga vel harum aliquam architecto quisquam porro, quibusdam commodi sint nostrum doloremque modi obcaecati eos odio tempora. Accusantium voluptate similique et fugiat id maiores impedit odio quibusdam repellendus, aliquam dolore illum non doloremque veritatis sunt quas quae accusamus enim nesciunt debitis sequi. Quibusdam voluptate velit non? Saepe inventore nulla pariatur numquam nisi vero consequatur ab necessitatibus ipsam molestiae iusto exercitationem assumenda id, cum aliquid fuga minus! Amet?"
        ],
        [
            "title" => "judul post kedua",
            "slug" => "judul-post-kedua",
            "autor" => "irvan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis exercitationem, recusandae, aliquam temporibus libero cumque quas commodi maxime odio doloribus id, tempore praesentium repellendus consectetur. Adipisci natus laudantium fuga totam blanditiis qui repellat ipsum animi praesentium explicabo recusandae exercitationem, facere fugit ducimus quam beatae. Id exercitationem modi, quam optio eos explicabo magni earum harum, ipsum ratione nam quo, odio iste! Laudantium id numquam aperiam incidunt hic natus debitis veritatis eos ducimus. Pariatur rerum placeat odit, molestiae saepe quod dicta quam a ea labore, accusamus dolores porro dignissimos mollitia inventore enim ducimus odio, quidem cumque. Qui facere explicabo placeat nisi odio."
        ],
    ];
    return view('posts',[
        "title" => "posts",
        "posts" => $blog_posts
    ]);
});


// halaman single post
Route::get('posts/{slug}', function($slug) {
    $blog_posts = [
        [
            "title" => "judul post pertama",
            "slug" => "judul-post-pertama",
            "autor" => "Luthfan",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere adipisci impedit incidunt, repellendus, fuga vel harum aliquam architecto quisquam porro, quibusdam commodi sint nostrum doloremque modi obcaecati eos odio tempora. Accusantium voluptate similique et fugiat id maiores impedit odio quibusdam repellendus, aliquam dolore illum non doloremque veritatis sunt quas quae accusamus enim nesciunt debitis sequi. Quibusdam voluptate velit non? Saepe inventore nulla pariatur numquam nisi vero consequatur ab necessitatibus ipsam molestiae iusto exercitationem assumenda id, cum aliquid fuga minus! Amet?"
        ],
        [
            "title" => "judul post kedua",
            "slug" => "judul-post-kedua",
            "autor" => "irvan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis exercitationem, recusandae, aliquam temporibus libero cumque quas commodi maxime odio doloribus id, tempore praesentium repellendus consectetur. Adipisci natus laudantium fuga totam blanditiis qui repellat ipsum animi praesentium explicabo recusandae exercitationem, facere fugit ducimus quam beatae. Id exercitationem modi, quam optio eos explicabo magni earum harum, ipsum ratione nam quo, odio iste! Laudantium id numquam aperiam incidunt hic natus debitis veritatis eos ducimus. Pariatur rerum placeat odit, molestiae saepe quod dicta quam a ea labore, accusamus dolores porro dignissimos mollitia inventore enim ducimus odio, quidem cumque. Qui facere explicabo placeat nisi odio."
        ],
    ];

    $new_post = [];
    foreach($blog_posts as $post) {
        if($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post',[
        "title" => "single post",
        "post" => $new_post
    ]);
});

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
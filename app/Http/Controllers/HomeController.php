<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $firstSegment;
    protected $secondSegment;
    protected $url = '';

    public function __construct(Request $request)
    {
        $this->firstSegment = \Request::segment(1);
        $this->secondSegment = \Request::segment(2);
        $this->url = url()->full();
    }

    public function index(Request $request)
    {
        $staticPages = ['faqs', 'privacy-policy', 'exchange-refund', 'events', 'notice', 'terms-of-service'];

        $logo = asset('/images/default_meta_image.png');

        $data = [
            'title'=> config('app.name'),
            'description'=> config('app.name'),
            'image'=> $logo,
            'url'=> $this->url
        ];
        $tagData = [
            'heading' => '',
            'paragraph' => '',
        ];

        // if($this->firstSegment == null){
        //     $data['title'] = $tagData['heading'] = 'Best Software Company - '.config('app.name');
        //     $data['description'] = $tagData['paragraph'] = $tagDescription = 'Binarydevs';
        // } elseif ($this->firstSegment == 'category'){
        //     $category = Category::where('_id', $this->secondSegment)
        //         ->orWhere('slug', $this->secondSegment)
        //         ->first();

        //     if($category && \Request::segment(3) != null) {
        //         $subCategory = $category->subCategories->filter(function ($sc) {
        //             return $sc->_id == \Request::segment(3) || $sc->slug == \Request::segment(3);
        //         })->first();

        //         if ($subCategory) {
        //             $data['title'] = $subCategory->en_name.' - '.config('app.name');
        //             $data['description'] = "Let’s Binarydevs ".$subCategory->en_name.". description";

        //             $tagData['heading'] = $subCategory->en_name.' - '.config('app.name');
        //             $tagData['paragraph'] = "Let’s Binarydevs ".$subCategory->en_name.". description";
        //         } else {
        //             return redirect()->route('home');
        //         }
        //     } else {
        //         if ($category) {
        //             $data['title'] = isset($category->meta_title) ? $category->meta_title : '';
        //             $data['description'] = isset($category->meta_description) ? $category->meta_description : '';

        //             $tagData['heading'] = isset($category->en_name) ? $category->en_name : '';
        //             $tagData['paragraph'] = isset($category->meta_description) ? $category->meta_description : '';
        //         } else {
        //             return redirect()->route('home');
        //         }
        //     }
        // }elseif ($this->firstSegment == 'new-releases'){
        //     $category = Category::find($this->secondSegment);

        //     $tagData['heading'] = "New Releases";
        //     $tagData['paragraph'] =  "Let’s watch the new release episodes following all the series. Sign up today and watch whenever you want on any device.";

        //     $data['title'] = " New Releases - ".config('app.name');
        //     $data['description'] = " Let’s watch the new release episodes following all the series on Hankook TV. Sign up today and watch whenever you want on any device.";

        //     if($category){
        //         $data['title'] = "New Releases of ".$category->en_name." - ".config('app.name');
        //         $data['description'] = 'Let’s enjoy the new release episodes following '.$category->en_name.' on Hankook TV. Let’s sign up today and watch whenever you want on any device. ';
        //     }

        // } elseif (in_array($this->firstSegment, $staticPages)){
        //     $page = Page::where('slug', $this->firstSegment)->first();
        //     if($page) {
        //         $data['title'] = $page->meta_title;
        //         $data['description'] = $page->meta_description;
        //         $tagData['heading'] = $page->title_en != '' ? $page->title_en : $page->meta_title;
        //         $tagData['paragraph'] = $page->content_en != '' ?  strip_tags($page->content_en) : $page->meta_description;
        //     }

        //     if($this->firstSegment == 'notice' && $this->secondSegment != null){
        //         $notice = Notice::find($this->secondSegment);
        //         if($notice){
        //             $data['title'] = $notice->title_en." - ".config('app.name');
        //             $data['description'] = $notice->title_en." has been described here. Let's see.";

        //             $tagData['heading'] = $notice->title_en;
        //             $tagData['paragraph'] = strip_tags($notice->description_en);
        //         }
        //     }
        // } elseif ($this->firstSegment == 'subscription'){
        //     $data['title'] =  "Subscription - ".config('app.name');
        //     $data['description'] = "Get the best entertainment with a ".config('app.name')." subscription. Stream your favorite shows and movies on any device. Join now for endless entertainment.";

        //     $tagData['heading'] = 'Hankook TV is an IPTV service profided by the korea times the largest korean-American media group in the United States';
        //     $tagData['paragraph'] = 'Hankook TV is an IPTV service profided by the korea times the largest korean-American media group in the United States';

        // }elseif ($this->firstSegment == 'sitemap'){
        //     $tagData['heading'] = 'Site Map';
        //     $tagData['paragraph'] = 'KBS, MBC, SBS, CABLE';
        //     $data['title'] =  "Sitemap - ".config('app.name');
        //     $data['description'] = "Explore the comprehensive sitemap of ".config('app.name')." for easy navigation. Discover a wide range of content and enjoy seamless streaming on our platform.";
        // }elseif ($this->firstSegment == 'account'){
        //     $tagData['heading'] = 'My Account';
        //     $tagData['paragraph'] = "Let's check your account details and start steaming the unlimited contents !!";
        //     $data['title'] =  "My Account - ".config('app.name');
        //     $data['description'] = "Let's check your account details and start steaming the unlimited contents !!";
        // }

        // $metas = $this->metaGenerator($data);

        // return view('index', compact('metas', 'tagData'));
        return view('front');
    }

    public function metaGenerator($data){

        return $metas = [
            [
                'name'=>'title',
                'content'=> $data['title']
            ],
            [
                'name'=>'description',
                'content'=> $data['description'],
            ],
            [
                'property'=>'og:description',
                'content'=> $data['description'],
            ],
            [
                'property'=>'og:title',
                'content'=> $data['title'],
            ],
            [
                'property'=>'og:site_name',
                'content'=> 'Hankook TV',
            ],
            [
                'property'=>'twitter:card',
                'content'=> 'summary',
            ],
            [
                'property'=>'og:type',
                'content'=> 'video.tv_show',
            ],
            [
                'property'=>'og:url',
                'content'=> $data['url'],
            ],
            [
                'property'=>'og:locale',
                'content'=> 'en_US',
            ],
            [
                'name'=> 'twitter:title',
                'content'=> $data['title'],
            ],
            [
                'name'=>'twitter:description',
                'content'=> $data['description'],
            ],
            [
                'property'=>'twitter:url',
                'content'=> $data['url'],
            ],

            [
                'name' => 'twitter:image',
                'content'=> $data['image'],
            ],
            [
                'property' => 'og:image',
                'content'=> $data['image'],
            ]
        ];
    }
}

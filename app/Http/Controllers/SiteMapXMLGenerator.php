<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slug;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SiteMapXMLGenerator extends Controller
{
    private $sitemap;

    /**
     * SiteMapXMLGenerator constructor.
     */
    public function __construct()
    {
        $this->sitemap = App::make("sitemap");
    }

    /**
     * generate and refresh sitemap.xml
     */
    public function generateXML()
    {
        $this->prepareXMLRoutes();
        $this->sitemap->store('xml', 'sitemap');
    }

    /**
     * Preparing routes for xml file
     * @return $this
     */
    public function prepareXMLRoutes() : SiteMapXMLGenerator
    {
        $this->sitemap->add(URL::to('/'), now(), '1.0', 'daily');

        $this->sitemap->add(URL::to('/sitemap'), now(), '0.9', 'daily');

        $this->sitemap->add(URL::to('/vivoz'), now(), '0.7', 'daily');
        $this->sitemap->add(URL::to('/demontazh'), now(), '0.7', 'daily');
        $this->sitemap->add(URL::to('/prices'), now(), '0.7', 'daily');
        $this->sitemap->add(URL::to('/contacts'), now(), '0.7', 'daily');

        foreach (Slug::all() as $slug) {
            $this->sitemap->add(URL::to($slug->name), now(), '0.6', 'daily');
        }

        return $this;
    }
}

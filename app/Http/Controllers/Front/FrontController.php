<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Socialfooter;
use App\Models\Logo;
use App\Models\HeroSection;
use App\Models\HeroFeature;
use App\Models\NavbarItem;
use App\Models\SiteLogo;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Get all records without status filtering for now
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $heroFeatures = HeroFeature::getOrdered();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        $services = Service::getActiveServices();
        
        return view('front.pages.index', compact('socialfooters', 'logos', 'heroSection', 'heroFeatures', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'services'));
    }
    
    /**
     * Display the about page
     */
    public function about()
    {
        // Get all records without status filtering for now
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        
        return view('front.pages.about', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo'));
    }
    
    /**
     * Display the services page
     */
    public function services()
    {
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        $services = Service::getActiveServices();
        
        return view('front.pages.services', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'services'));
    }
    
    /**
     * Display the investors page
     */
    public function investors()
    {
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        
        return view('front.pages.investors', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo'));
    }
    
    /**
     * Display the FAQ page
     */
    public function faq()
    {
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        
        return view('front.pages.faq', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo'));
    }
    
    /**
     * Display the contact page
     */
    public function contact()
    {
        // Get all records without status filtering for now
        $socialfooters = Socialfooter::orderBy('order')->get();
        $logos = Logo::all();
        $heroSection = HeroSection::first();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        
        return view('front.pages.contact', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo'));
    }
    
    /**
     * Handle contact form submission
     */
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);
        
        // Here you can add logic to save contact form data to database
        // or send email notification
        
        return back()->with('success', 'Mesajınız başarıyla gönderildi! En kısa sürede size dönüş yapacağız.');
    }
    
    /**
     * Handle newsletter subscription
     */
    public function newsletterSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        
        // Here you can add logic to save newsletter subscription
        // to database or integrate with email service
        
        return response()->json([
            'success' => true,
            'message' => 'Bültene başarıyla abone oldunuz!'
        ]);
    }
    
    /**
     * Handle tracking form
     */
    public function trackPackage(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string|max:50',
        ]);
        
        // Here you can add logic to track package
        // This is just a mock response
        
        return response()->json([
            'success' => true,
            'tracking_number' => $request->tracking_number,
            'status' => 'In Transit',
            'location' => 'Distribution Center',
            'estimated_delivery' => date('Y-m-d', strtotime('+3 days')),
            'message' => 'Gönderi bulundu! Şu anda dağıtım merkezinde.'
        ]);
    }
}

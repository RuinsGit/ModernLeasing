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
use App\Models\Advantage;
use App\Models\MissionGoal; // Yeni əlavə edildi
use App\Models\StatItem; // Yeni əlavə edildi
use App\Models\Partner; // Yeni əlavə edildi
use App\Models\ContactInfo; // Yeni əlavə edildi
use App\Models\CompanyHistoryItem; // Yeni əlavə edildi
use App\Models\AboutMissionSection; // Yeni əlavə edildi
use App\Models\AboutMissionCard; // Yeni əlavə edildi
use App\Models\TeamMember; // Yeni əlavə edildi
use App\Models\NewsItem; // Yeni əlavə edildi
use App\Models\ContactMessage; // Yeni əlavə edildi
use App\Models\BusinessHour; // Yeni əlavə edildi
use App\Models\PartnershipSection; // Yeni əlavə edildi
use App\Models\PartnershipFeature; // Yeni əlavə edildi
use App\Models\PartnershipType; // Yeni əlavə edildi
use App\Models\InvestorContactSection; // Yeni əlavə edildi
use App\Models\FaqCategory; // Yeni əlavə edildi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $services = Service::getActiveServices()->take(6);
        $advantages = Advantage::getActiveAdvantages();
        $missionGoals = MissionGoal::getActiveMissionGoals(); // Yeni əlavə edildi
        $statItems = StatItem::getActiveStatItems(); // Yeni əlavə edildi
        $partners = Partner::getActivePartners(); // Yeni əlavə edildi
        $contactInfo = ContactInfo::getActiveContactInfo(); // Yeni əlavə edildi
        $businessHours = BusinessHour::getActiveBusinessHours(); // Yeni əlavə edildi
        
        return view('front.pages.index', compact('socialfooters', 'logos', 'heroSection', 'heroFeatures', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'services', 'advantages', 'missionGoals', 'statItems', 'partners', 'contactInfo', 'businessHours'));
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
        $advantages = Advantage::getActiveAdvantages();
        $contactInfo = ContactInfo::getActiveContactInfo(); // Yeni əlavə edildi
        $companyHistoryItems = CompanyHistoryItem::getActiveHistoryItems(); // Yeni əlavə edildi
        $aboutMissionSection = AboutMissionSection::getActiveMissionSection(); // Yeni əlavə edildi
        $aboutMissionCards = AboutMissionCard::getActiveCards(); // Yeni əlavə edildi
        $teamMembers = TeamMember::getActiveTeamMembers(); // Yeni əlavə edildi
        $newsItems = NewsItem::getActiveNewsItems(); // Yeni əlavə edildi
        $businessHours = BusinessHour::getActiveBusinessHours(); // Yeni əlavə edildi
        $services = Service::getActiveServices()->take(6); // Yeni əlavə edildi
        
        return view('front.pages.about', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'advantages', 'contactInfo', 'companyHistoryItems', 'aboutMissionSection', 'aboutMissionCards', 'teamMembers', 'newsItems', 'businessHours', 'services'));
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
        $services = Service::getActiveServices()->take(6);
        $contactInfo = ContactInfo::getActiveContactInfo(); // Yeni əlavə edildi
        $businessHours = BusinessHour::getActiveBusinessHours(); // Yeni əlavə edildi
        
        return view('front.pages.services', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'services', 'contactInfo', 'businessHours'));
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
        $contactInfo = ContactInfo::getActiveContactInfo(); // Yeni əlavə edildi
        $businessHours = BusinessHour::getActiveBusinessHours(); // Yeni əlavə edildi
        $partnershipSection = PartnershipSection::getSectionData(); // Yeni əlavə edildi
        $partnershipFeatures = PartnershipFeature::getActiveFeatures(); // Yeni əlavə edildi
        $partnershipTypes = PartnershipType::getActiveTypes(); // Yeni əlavə edildi
        $partners = Partner::getActivePartners(); // Yeni əlavə edildi
        $investorContactSection = InvestorContactSection::getSectionData(); // Yeni əlavə edildi
        $services = Service::getActiveServices()->take(6); // Yeni əlavə edildi
        
        return view('front.pages.investors', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'contactInfo', 'businessHours', 'partnershipSection', 'partnershipFeatures', 'partnershipTypes', 'partners', 'investorContactSection', 'services'));
    }
    
    /**
     * Display the FAQ page
     */
    public function faq()
    {
        $socialfooters = Socialfooter::getActiveSocialfooters();
        $logos = SiteLogo::getActiveLogo();
        $heroSection = HeroSection::getFirst();
        $desktopNavbarItems = NavbarItem::getDesktopItems();
        $mobileNavbarItems = NavbarItem::getMobileItems();
        $siteLogo = SiteLogo::getActiveLogo();
        $contactInfo = ContactInfo::getActiveContactInfo();
        $businessHours = BusinessHour::getActiveBusinessHours();
        $faqCategories = FaqCategory::with('faqItems')->where('is_active', true)->orderBy('order')->get();
        $services = Service::getActiveServices()->take(6); // Yeni əlavə edildi
        
        return view('front.pages.faq', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'contactInfo', 'businessHours', 'faqCategories', 'services'));
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
        $contactInfo = ContactInfo::getActiveContactInfo(); // Yeni əlavə edildi
        $businessHours = BusinessHour::getActiveBusinessHours(); // Yeni əlavə edildi
        $services = Service::getActiveServices()->take(6); // Yeni əlavə edildi
        
        return view('front.pages.contact', compact('socialfooters', 'logos', 'heroSection', 'desktopNavbarItems', 'mobileNavbarItems', 'siteLogo', 'contactInfo', 'businessHours', 'services'));
    }
    
    /**
     * Handle contact form submission
     */
    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Zəhmət olmasa, bütün tələb olunan sahələri düzgün doldurun.',
                'errors' => $validator->errors()
            ], 422);
        }
        
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Mesajınız uğurla göndərildi! Tezliklə sizinlə əlaqə saxlayacağıq.'
        ]);
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

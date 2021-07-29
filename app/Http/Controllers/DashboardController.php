<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\MarketRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /** @var  OrderRepository */
    private $orderRepository;


    /**
     * @var UserRepository
     */
    private $userRepository;

    /** @var  MarketRepository */
    private $marketRepository;
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(OrderRepository $orderRepo, UserRepository $userRepo, PaymentRepository $paymentRepo, MarketRepository $marketRepo)
    {
        parent::__construct();
        $this->orderRepository = $orderRepo;
        $this->userRepository = $userRepo;
        $this->marketRepository = $marketRepo;
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('branch') || auth()->user()->hasRole('manager'))
        {
            $ordersCount = $this->orderRepository->whereHas('user.country', function($q){
                return $q->where('countries.id',get_role_country_id('branch'));
            })->count();
            $membersCount = $this->userRepository->where('country_id',get_role_country_id('branch'))->count();
            $marketsCount = $this->marketRepository->where('country_id',get_role_country_id('branch'))->count();
            $markets = $this->marketRepository->where('country_id',get_role_country_id('branch'))->limit(4)->get();
            $earning = $this->paymentRepository->whereHas('user.country', function($q){
                return $q->where('countries.id',get_role_country_id('branch'));
            })->all()->where('status','Paid')->sum('price');
            $ajaxEarningUrl = route('payments.byMonth',['api_token'=>auth()->user()->api_token]);
        }
        else
        {
            $ordersCount = $this->orderRepository->count();
            $membersCount = $this->userRepository->count();
            $marketsCount = $this->marketRepository->count();
            $markets = $this->marketRepository->limit(4)->get();
            $earning = $this->paymentRepository->where('status','Paid')->sum('price');
            $ajaxEarningUrl = route('payments.byMonth',['api_token'=>auth()->user()->api_token]);

        }

//        dd($ajaxEarningUrl);
        return view('dashboard.index')
            ->with("ajaxEarningUrl", $ajaxEarningUrl)
            ->with("ordersCount", $ordersCount)
            ->with("marketsCount", $marketsCount)
            ->with("markets", $markets)
            ->with("membersCount", $membersCount)
            ->with("earning", $earning);
    }
}

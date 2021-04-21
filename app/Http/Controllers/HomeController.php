<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WebToPay;
use WebToPayException;

use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\MarketRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;
use Flash,Auth;


class HomeController extends Controller
{
        private $orderRepository;
        private $userRepository;
        private $marketRepository;
        private $paymentRepository;
        private $categoryRepository;
        private $productRepository;
        private $cartRepository;
    
        public function __construct(OrderRepository $orderRepo, UserRepository $userRepo, PaymentRepository $paymentRepo, MarketRepository $marketRepo,CategoryRepository $categoryRepo,ProductRepository $productRepo, CartRepository $cartRepo)
        {
            parent::__construct();
            $this->orderRepository = $orderRepo;
            $this->userRepository = $userRepo;
            $this->marketRepository = $marketRepo;
            $this->categoryRepository = $categoryRepo;
            $this->productRepository = $productRepo;
            $this->paymentRepository = $paymentRepo;
            $this->cartRepository = $cartRepo;

        }

    public function index()
    {
        $products = $this->productRepository->all();
        
        return view('frontend.home',compact('products'));
    }

    public function product($id)
    {
        $products = $this->productRepository->all();
        $product = $this->productRepository->find($id);
        $user = $this->userRepository->pluck('name','id');
        $customFields=false;
        return view('frontend.product',compact('user','product','products','customFields'));
    }

    public function market($id)
    {
        $market = $this->marketRepository->find($id);
        $user = $this->userRepository->pluck('name','id');
        $customFields=false;
        return view('frontend.market',compact('user','market','customFields'));
    }
    public function cart()
    {
        $products=$this->cartRepository->with('product','options')->where('user_id',auth()->id())->get();
        $product = $this->cartRepository->with('product','product.market','product.market.currency')->where('user_id',Auth::user()->id)->first();
        if(empty($product))
        {
            Flash::error('Please Select Products in Cart First');
            return redirect(route('home'));
        }
        $deliveryAddress=getDeliveryAddressID();
        return view('frontend.carts.index')->with("customFields", isset($html) ? $html : false)->with("deliveryAddress", $deliveryAddress)->with("product", $product)->with("products", $products);
    }
    public function cart_ajax()
    {
        $products=$this->cartRepository->with('product','options')->where('user_id',auth()->id())->get();
        $data = view('frontend.carts.all',['products'=>$products])->render();
        return $this->sendResponse($data, __('lang.saved_successfully',['operator' => __('lang.cart')]));
    }
    public function cart_ajax_update(Request $request)
    {
        $cart=$this->cartRepository->find($request->input('cart_id'));
        if($cart)
        {
            if($request->type=='update_cart')
            {
                $cart->quantity=$cart->quantity+1;
                $cart->update();
            }
            else
            {
                $cart->quantity=$cart->quantity-1;
                $cart->update();

            }
        }

        return $this->sendResponse($cart, __('lang.saved_successfully',['operator' => __('lang.cart')]));
    }

    public function cart_ajax_delete(Request $request)
    {
        $cart=$this->cartRepository->find($request->input('cart_id'));
        $cart->delete();
        $products=$this->cartRepository->with('product','options')->where('user_id',auth()->id())->get();
        $data = view('frontend.carts.all',['products'=>$products])->render();
        return $this->sendResponse($data, __('lang.deleted_successfully',['operator' => __('lang.cart')]));
    }
}
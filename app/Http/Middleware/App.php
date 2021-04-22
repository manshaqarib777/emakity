<?php namespace App\Http\Middleware;

use App\Repositories\UploadRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CartRepository;
use App\Repositories\FieldRepository;
use Carbon\Carbon;
use Closure;

class App
{

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en', 'fr']; // en, fr

    protected $uploadRepository;
    protected $categoryRepository;
    protected $cartRepository;
    private $fieldRepository;
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            app()->setLocale(setting('language', app()->getLocale()));
        } else {
            app()->setLocale($request->getPreferredLanguage($this->languages));
        }
        try {
            Carbon::setLocale(app()->getLocale());
            // config(['app.timezone' => setting('timezone')]);

            $this->uploadRepository = new UploadRepository(app());
            $this->categoryRepository = new CategoryRepository(app());
            $this->cartRepository = new CartRepository(app());
            $this->fieldRepository = new FieldRepository(app());
            $upload = $this->uploadRepository->findByField('uuid', setting('app_logo', ''))->first();
            $appLogo = asset('images/logo_default.png');
            if ($upload && $upload->hasMedia('app_logo')) {
                $appLogo = $upload->getFirstMediaUrl('app_logo');
            }
            $categories = $this->categoryRepository->with(['markets','markets.products']);
            $fields = $this->fieldRepository->get();
            view()->share('app_logo', $appLogo);
            view()->share('app_categories', $categories);
            view()->share('app_fields', $fields);
            if(auth()->user())
            {
                view()->share('app_carts',$this->cartRepository->where('user_id',auth()->id())->get()->count());
            }
        } catch (\Exception $exception) { }

        return $next($request);
    }

}
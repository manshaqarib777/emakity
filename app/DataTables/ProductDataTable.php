<?php
/**
 * File name: ProductDataTable.php
 * Last modified: 2020.05.04 at 09:04:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\DataTables;

use App\Models\CustomField;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * custom fields columns
     * @var array
     */
    public static $customFields = [];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        if (auth()->user()->hasRole('client'))
        $query = $query->where('user_id', auth()->id());
        if (auth()->user()->hasRole('branch') || auth()->user()->hasRole('manager'))
        $query = $query->whereHas('market.country', function($q){
            return $q->where('countries.id',get_role_country_id('branch'));
        });
        $dataTable = new EloquentDataTable($query->with(['market','market.country','market.country.currency']));
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = $dataTable
        ->editColumn('market.country.name', function ($product) {
            return $product['market']['country']['name'];
        })
            ->editColumn('image', function ($product) {
                return getMediaColumn($product, 'image');
            })
            ->editColumn('web_image', function ($product) {
                return getMediaColumn($product, 'web_image');
            })
            ->editColumn('price', function ($product) {
                return getPriceColumn($product,$product['market'],'price');
            })
            ->editColumn('discount_price', function ($product) {
                return getPriceColumn($product,$product['market'],'discount_price');
            })
            ->editColumn('capacity', function ($product) {
                return $product['capacity']." ".$product['unit'];
            })
            ->editColumn('updated_at', function ($product) {
                return getDateColumn($product, 'updated_at');
            })
            ->editColumn('featured', function ($product) {
                return getBooleanColumn($product, 'featured');
            })
            ->addColumn('action', 'products.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {

        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('branch') || auth()->user()->hasRole('manager')) {
            return $model->newQuery()->with("market.country")->with("category")->select('products.*')->orderBy('products.updated_at','desc');
        } else if (auth()->user()->hasRole('driver')) {
            return $model->newQuery()->with("market.country")->with("category")
                ->join("driver_markets", "driver_markets.market_id", "=", "products.market_id")
                ->where('driver_markets.user_id', auth()->id())
                ->groupBy('products.id')
                ->select('products.*')->orderBy('products.updated_at', 'desc');
        } else if (auth()->user()->hasRole('client')) {
            return $model->newQuery()->with("market.country")->with("category")
                ->join("product_orders", "product_orders.product_id", "=", "products.id")
                ->join("orders", "product_orders.order_id", "=", "orders.id")
                ->where('orders.user_id', auth()->id())
                ->groupBy('products.id')
                ->select('products.*')->orderBy('products.updated_at', 'desc');
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title'=>trans('lang.actions'),'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
            ->parameters(array_merge(
                config('datatables-buttons.parameters'), [
                    'language' => json_decode(
                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')
                        ), true)
                ]
            ));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if(auth()->check() && auth()->user()->hasRole('admin'))
        {
            $columns = [
                [
                    'data' => 'name',
                    'title' => trans('lang.product_name'),
    
                ],
                [
                    'data' => 'market.country.name',
                    'title' => trans('lang.country'),
    
                ],
                [
                    'data' => 'market.country.name',
                    'title' => trans('lang.country'),
                ],
                [
                    'data' => 'image',
                    'title' => trans('lang.product_image'),
                    'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
                ],
                [
                    'data' => 'web_image',
                    'title' => trans('lang.product_web_image'),
                    'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
                ],
                [
                    'data' => 'price',
                    'title' => trans('lang.product_price'),
    
                ],
                [
                    'data' => 'discount_price',
                    'title' => trans('lang.product_discount_price'),
    
                ],
                [
                    'data' => 'capacity',
                    'title' => trans('lang.product_capacity'),
    
                ],
                [
                    'data' => 'featured',
                    'title' => trans('lang.product_featured'),
    
                ],
                [
                    'data' => 'market.name',
                    'title' => trans('lang.product_market_id'),
    
                ],
                [
                    'data' => 'category.name',
                    'title' => trans('lang.product_category_id'),
    
                ],
                [
                    'data' => 'updated_at',
                    'title' => trans('lang.product_updated_at'),
                    'searchable' => false,
                ]
            ];

        }
        else
        {
            $columns = [
                [
                    'data' => 'name',
                    'title' => trans('lang.product_name'),
    
                ],
                [
                    'data' => 'image',
                    'title' => trans('lang.product_image'),
                    'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
                ],
                [
                    'data' => 'web_image',
                    'title' => trans('lang.product_web_image'),
                    'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
                ],
                [
                    'data' => 'price',
                    'title' => trans('lang.product_price'),
    
                ],
                [
                    'data' => 'discount_price',
                    'title' => trans('lang.product_discount_price'),
    
                ],
                [
                    'data' => 'capacity',
                    'title' => trans('lang.product_capacity'),
    
                ],
                [
                    'data' => 'featured',
                    'title' => trans('lang.product_featured'),
    
                ],
                [
                    'data' => 'market.name',
                    'title' => trans('lang.product_market_id'),
    
                ],
                [
                    'data' => 'category.name',
                    'title' => trans('lang.product_category_id'),
    
                ],
                [
                    'data' => 'updated_at',
                    'title' => trans('lang.product_updated_at'),
                    'searchable' => false,
                ]
            ];
        }


        $hasCustomField = in_array(Product::class, setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFieldsCollection = CustomField::where('custom_field_model', Product::class)->where('in_table', '=', true)->get();
            foreach ($customFieldsCollection as $key => $field) {
                array_splice($columns, $field->order - 1, 0, [[
                    'data' => 'custom_fields.' . $field->name . '.view',
                    'title' => trans('lang.product_' . $field->name),
                    'orderable' => false,
                    'searchable' => false,
                ]]);
            }
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'productsdatatable_' . time();
    }

    /**
     * Export PDF using DOMPDF
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename() . '.pdf');
    }
}
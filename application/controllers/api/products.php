<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends KS_Controller {

    public function index($sortBy = null) {
        $this->thisIsAjax();

        $requestCategories = $this->request('categories');
        $search = $this->request('search');

        $oproducts = array();
        if (count($requestCategories) == 0) {
            $criteria = array();
            if (!empty($search)) {
                $fields  = array('name', 'description', 'price', 'discountPrice');
                foreach ($fields as $field) {
                    $criteria[$field] = $search;
                }
            }
            $oproducts = $this->productRepo->searchBy($criteria);
        }
        else {
            global $category;
            foreach ($requestCategories as $category) {
                $criteria = array();
                if (!empty($search)) {
                    $fields  = array('name', 'description', 'price', 'discountPrice');
                    foreach ($fields as $field) {
                        $criteria[$field] = $search;
                    }
                }
                $categoryProducts = array_filter($this->productRepo->searchBy($criteria), function ($product) {
                    global $category;
                    return in_array($this->categoryRepo->find($category->id), $product->getCategories()->toArray());
                });
                $oproducts = array_merge($oproducts, $categoryProducts);
            }
        }


        $products = array();
        foreach ($oproducts as $product) {
            if (count($product->getAvailableKeys()) == 0)
                continue;
            $t = array();
            $t = $product->getHomeArray();
            $t['url'] = site_url('produkt/'.urlencode($t['name']));
            $products[] = $t;
            unset($t);
        }

        // delete duplicates
        $products = array_map('unserialize', array_unique(array_map('serialize', $products)));

        // sort orders
        switch ($sortBy) {
            case 'price':
                $products = $this->arrayOrderBy($products, 'price', SORT_DESC);
                break;
            default:
                // 'name' belongs to default
                $products = $this->arrayOrderBy($products, 'name', SORT_ASC);
                break;
        }

        echo json_encode(array(
            'products'    => $products
        ));
    }

    private function arrayOrderBy($products, $field, $sort)
    {
        $filter = array();
        foreach ($products as $key => $product) {
            if ($field === 'price') {
                $filter[$key] = str_replace(' CHF' , '', $product['hasDiscountPrice'] ? $product['discountPrice'] : $product['price']);
            } else {
                $filter[$key] = $product[$field];
            }
        }
        $data = &$products;
        array_multisort($filter, $sort, $data);

        return $products;
    }

    public function name() {
        $this->index('name');
    }

    public function price() {
        $this->index('price');
    }
}

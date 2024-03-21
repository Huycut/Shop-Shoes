<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    
    
    public function loadLayout($data){
       
        $file=$this->fileCssAndJs();

        $data['footer'] = view('Home/footer');
        $data['header'] = view('Home/header'); 
        $data['cssFiles'] = $file['cssFiles'];
        $data['jsFiles'] = $file['jsFile'];
       // $data['content']= view($content, $dataContent);
        
        return $data;
    }
    public function fileCssAndJs(){
        $file['cssFiles']=[
            'css/linearicons.css',
            'css/font-awesome.min.css',
            'css/themify-icons.css',
            'css/bootstrap.css',
            'css/owl.carousel.css',
            'css/nice-select.css',
            'css/nouislider.min.css',
            'css/ion.rangeSlider.css',
            'css/ion.rangeSlider.skinFlat.css',
            'css/magnific-popup.css',
            'css/main.css',
            
            ];
        $file['jsFile']=[
            'js/vendor/jquery-2.2.4.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
            'js/vendor/bootstrap.min.js',
            'js/jquery.ajaxchimp.min.js',
            'js/jquery.nice-select.min.js',
            'js/jquery.sticky.js',
            'js/nouislider.min.js',
            'js/countdown.js',
            'js/jquery.magnific-popup.min.js',
            'js/owl.carousel.min.js',
            'https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE',
            'js/gmaps.min.js',
            'js/main.js',
            'js/convertToVND.js',
        ];
        return $file;
    }
}

<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\CategoriesModel;
use App\Models\CheckoutDetailModel;
use App\Models\CheckoutModel;
use App\Models\FavoritesModel;
use App\Models\ProductModel;
use App\Models\ReviewModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
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
class BaseController extends Controller
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
    protected $helpers = ['my_helper'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        date_default_timezone_set("Asia/Jakarta");
        session();
        $this->validation = Services::validation();
        $this->pagination = Services::pager();
        $this->userModel = new UsersModel();
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
        $this->favoritesModel = new FavoritesModel();
        $this->categoriesModel = new CategoriesModel();
        $this->checkoutModel = new CheckoutModel();
        $this->checkoutDetailModel = new CheckoutDetailModel();
        $this->reviewModel = new ReviewModel();

        // Auto delete checkout pending
        $this->checkoutModel->deletePendingProduct();

        // removeSessionCheckoutId();
    }
}

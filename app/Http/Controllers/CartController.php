<?php

namespace App\Http\Controllers;

use App\Product;
use App\Region;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Category;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;


class CartController extends Controller
{
    private $cart;
    protected $transaction;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function add(Product $product)
    {
        if($product->offerPrice){
            $this->cart::add($product->id, $product->name, 1,$product->offerPrice)->associate('App\Product');
        }
        else{
            $this->cart::add($product->id, $product->name, 1,$product->currentPrice)->associate('App\Product');
        }
        Session::flash('message','El Producto ha sido agregado al carro de compras');
        return redirect('/productos/'.$product->URL);
    }

    public function index()
    {
        $cart = $this->cart::content();
        $categories = Category::all();
        return view('public.cart.index',['cart'=>$cart,'categories'=>$categories,]);
    }

    public function deleteItem(Request $request)
    {
        Cart::remove($request->item);
    }

    public function destroy()
    {
        $this->cart::destroy();
        Session::flash('Carro de compras vaciado satisfactoriamente');
        return redirect()->back();
    }

    /** Proceso de Compra
     * 1-Login
     */
    public function loginCheckout()
    {
        return view('public.transaction.login');
    }
    /** Proceso de Compra
     * 2-Despacho
    */
    public function stepOne(Request $request)
    {
        $user = new User();
        $user->name     = $request->name;
        $user->surname  = $request->surname;
        $user->rut      = $request->rut;
        $user->email    = $request->email;
        Session::put('user',collect($user));

        $region = Region::all();
        return view('public.transaction.delivery',['region' => $region]);
    }
    /** Proceso de Compra
     * 3-Regumen Previo Pago
     */
    public function stepTwo(Request $request)
    {
        return view('public.transaction.pay');
    }
    /** Proceso de Compra
     * Pago - Inico Transbank
     */
    public function pay() {

        $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();

        $amount = $this->cart::total(0, ',','');
        // Identificador que será retornado en el callback de resultado:
        $sessionId = "mi-id-de-sesion";
        // Identificador único de orden de compra:
        $buyOrder = strval(rand(100000, 999999999));
        $returnUrl = route('webpay.voucher');
        $finalUrl = route('webpay.final');

        $initResult = $transaction->initTransaction($amount, $buyOrder, $sessionId, $returnUrl, $finalUrl);

        $formAction = $initResult->url;
        $tokenWs = $initResult->token;

        return view('public.transaction.webpay-token',['tokenWs'=>$tokenWs,'formAction'=>$formAction]);
    }

    public function token() {
        return view("public.transaction.webpay-token");
    }
    /** Proceso de Compra
     * Pago - Generar Voucher Transbank
     */
    public function voucher(Request $request)
    {
        if (!$request->get('token_ws')) {
            return dd('Error. No token recibido');
        }else{
            $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();

            $tokenWs = $request->get('token_ws');
            $result = $transaction->getTransactionResult($tokenWs);

            if (isset($result->detailOutput)) {
                if (isset($result->detailOutput->responseCode) && $result->detailOutput->responseCode === 0) {
                    $details = $result->detailOutput;
                    $cartNumber = $result->cardDetail->cardNumber;
                    return view("public.transaction.webpay-voucher",['tokenWs'=>$tokenWs,'result'=>$result,'details'=>$details,'cartNumber'=>$cartNumber]);
                } else {
                    // Error a comprar
                    switch ($result->detailOutput->responseCode) {
                        case -1:
                            $titleError = "Su Pago ha sido Rechazo";
                            $messageError = "Hubo un error en el ingreso de datos en la transacción, intente nuevamente.";
                            break;
                        case -2:
                            $titleError = "Su Pago ha sido Rechazo";
                            $messageError = "Hubo un error en el ingreso de los datos de tu tarjeta y/o su cuenta asociada, intente nuevamente.";
                            break;
                        case -3:
                            $titleError = "Error en la transacción";
                            $messageError = "Hubo un error en los servicios de Transank, intente mas tarde.";
                            break;
                        case -4:
                            $titleError = "Medio de pago rechazo";
                            $messageError = "Su tarjeta fue rechazada por la entidad bancaria, contacte con su banco o pruebe con otro medio de pago.";
                            break;
                        case -5:
                            $titleError = "Rechazado por posible fraude";
                            $messageError = "Su tarjeta fue rechazada por un riesgo de posible fraude, por seguridad contacte con su entidad bancaria.";
                            break;
                    }
                    return view("public.transaction.confirmation",['transaction'=>'Error','titleError'=>$titleError,'messageError'=>$messageError]);
                }
            }else{
               return Redirect::route('index');
            }

            /**
            $result->cardDetail->cardNumber;

            $details->paymentTypeCode (
            VD = Venta Débito.
            VN = Venta Normal.
            VC = Venta en cuotas.
            SI = 3 cuotas sin interés.
            S2 = 2 cuotas sin interés.
            NC = N Cuotas sin interés
            VP = Venta Prepago.
             *
             * details->responseCode
             *
            0 = Transacción aprobada
            -1 = Rechazo de transacción - Reintente (Posible error en el ingreso de datos de la transacción)
            -2 = Rechazo de transacción (Se produjo fallo al procesar la transacción. Este mensaje de rechazo está relacionado a parámetros de la tarjeta y/o su cuenta asociada)
            -3 = Error en transacción (Interno Transbank)
            -4 = Rechazo emisor (Rechazada por parte del emisor)
            -5 = Rechazo - Posible Fraude (Transacción con riesgo de posible fraude)
            *
             * details->amount
            */
        }
    }

    public function confirmation()
    {
        return view("public.transaction.confirmation");
    }
}

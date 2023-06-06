<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\menu;
use App\Models\Kode;
use App\Models\Order;
use Spatie\LaravelIgnition\Support\LivewireComponentParser;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\SistemTampilan;
use App\Models\Kasir;
use Illuminate\Support\Str;

class MejaController extends Controller
{
     public function index()
    {
        $t = SistemTampilan::all();
        $user = auth()->user();
        return view('menu.login', compact('user', 't'));
    }
    public function menu_order()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.dashboard', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_drinks()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'juice')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.juice', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_food()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'ayam')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.ayam', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_cake()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'kudapan')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.kudapan', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_coffe()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'kopi')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.kopi', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_lelenggahan()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'lelenggahan')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.lelenggahan', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_snack()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'teh')->get();
        $user = auth()->user();
        $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.teh', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_ikan()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'ikan')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.ikan', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_iga()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'iga')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.iga', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_seafood()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'seafood')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.seafood', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_sayur()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'sayur')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.sayur', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_nasi()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'nasi')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.nasi', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_spesial()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'spesial')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.spesial', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_tradisonal()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'tradisonal')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.tradisonal', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_penyetan()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'penyetan')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.penyetan', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_jeruk()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'jeruk')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.jeruk', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_milk()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'milk')->get();
        $user = auth()->user();
         $order = Order::where('id_user', Auth::user()->id_user)->where('checkout', 'belum')->count();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.menu.milk', compact('m', 'order', 'o', 'user', 't'));
    }
    public function store(Request $request, $id)
    {
        $item = $request->all();
        User::where(['id' => $id])->update([
            'customer' => $item['customer']
        ]);
        $user = auth()->user();
        Kasir::create([
            'nama' => $request->customer,
            'meja' => $user->name,
            'tempat' => $user->tempat,
            'tgl' => date("Y-m-d"),
            'id_user' => $user->id_user,
        ]);
        Kode::create([
            'tgl' => date("Y-m-d"),
            'nama_pengguna' => $request->customer,
            'id_user' => $user->id_user,
        ]);
        return redirect()->route('menu.order');
    }
    public function order(Request $request)
    {

        $user = auth()->user();
        $order = Order::all();
        Order::create([
            'id_menu' => $request->id_menu,
            'nama_pengguna' => $user->customer,
            'id_user' => $user->id_user,
            'meja' => $user->name,
            'total' => $request->total,
        ]);
        return redirect()->back();
    }
    public function order_hapus($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }
    public function order_tambah(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where(['id' => $id])->update([
            'total' => $request->total,

        ]);
        return back();
    }
    public function order_checkout(Request $request)
    {
        $id_user = $request->id_user;
        $cart = Kode::where('id_user', Auth::user()->id_user)->get();
        $user = auth()->user();
        foreach ($cart as $item) {
            Order::where(['id_user' => $user->id_user])->update([
                'checkout' => 'sudah',
                'id_cart' => $item->id,
                'tempat' => $user->tempat,
            ]);
            Kasir::where(['id_user' => $user->id_user])->update([
                'id_cart' => $item->id,
            ]);
        }
        return redirect()->route('menu.cart');
    }
    public function checkout()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();

        return view('menu.checkout', compact('m', 'o', 'user', 't'));
    }
    public function cart()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $o = Order::where('id_user', Auth::user()->id_user)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.*')
            ->get();
        return view('menu.cart', compact('m', 'o', 'user', 't'));
    }
    public function kode(Request $request)
    {
        User::where(['id' => $request->id])->update([
            'id_user' => Str::random(5),
        ]);
        return redirect()->route('/');
    }
    public function terimakasih()
    {
        $t = SistemTampilan::all();
        return view('menu.salam', compact('t'));
    }
}
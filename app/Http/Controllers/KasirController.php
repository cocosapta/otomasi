<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\Order;
use App\Models\Meja;
use App\Models\SistemTampilan;
use App\Models\Reservasi;
use App\Models\Kasir;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KasirController extends Controller
{

    public function index()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
         $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
  
        return view('kasir.dashboard', compact('m', 't','jumlah_pesanan'));
    }
    public function menu()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
         $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
  
        return view('kasir.menu', compact('m', 't','jumlah_pesanan'));
    }
    public function kasir()
    {
        $t = SistemTampilan::all();
        $k = Kasir::where('status', 'belum')->orderBy('created_at', 'desc')->get();
        //Kasir::all()->sortByDesc('created_at');
        $read = Order::join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'order.id_cart', 'menu.harga','order.total')
            ->get();
            
             $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
  
  
        return view('kasir.kasir', compact('read', 'k', 't','jumlah_pesanan'));
    }
    
    
     public function monitor_dapur()
    {
        $t = SistemTampilan::all();
        $k = Kasir::where('status', 'sudah')->orderBy('updated_at', 'desc')->get();
        //Kasir::all()->sortByDesc('updated_at');
        
        $read = Order::join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'order.id_cart', 'menu.harga','order.total','order.dapur')
            ->get();
            
             $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
  
  
        return view('kasir.monitor_dapur', compact('read', 'k', 't','jumlah_pesanan'));
    }
    
    
       public function reservasi()
    {
        $t = SistemTampilan::all();
        $user = User::all();
        $r = Reservasi::all()->sortByDesc("tgl");
         //$jumlah_pesanan= Reservasi::all()->where('status','LIKE','%cancel%')->count();
         $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
        return view('kasir.order_on', compact('r', 't','jumlah_pesanan','user'));
    }
    
    //xxxxxxxxxxxxxxxx fitur baru xxxxxxxxxxxxxxxxxx
    public function selesai(Request $request, $id_cart)
    {
        Kasir::where('id_cart', $id_cart)->update([
            'status' => 'sudah',
        ]);
        $order = Order::find($id_cart);
        Order::where(['id_cart' => $id_cart])->update([
            'status_order' => 's',
        ]);
            Pembayaran::create([
              'id_cart' => $id_cart,  
              'total' => $request->total,  
              ]);
        // if($order->status_order =='s' | $order->id_cart == $id_cart){
        // }
        return redirect()->back();
    }
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function status(Request $request, $id)
    {
        $menu = menu::find($id);
        if ($menu->status == 'ready') {
            $menu = $request->all();
            menu::where(['id' => $id])->update([
                'status' => $menu['sold'],
            ]);
        } elseif ($menu->status == 'sold out') {
            $menu = $request->all();
            menu::where(['id' => $id])->update([
                'status' => $menu['ready'],
            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function status_order(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order->status_order == 'acc') {
            $order = $request->all();
            Order::where(['id' => $id])->update([
                'status_order' => $order['cansel'],
            ]);
        } elseif ($order->status_order == 'cansel') {
            $order = $request->all();
            Order::where(['id' => $id])->update([
                'status_order' => $order['acc'],
            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function proses(Request $request)
    {
        $kredensial = $request->only('kode', 'nama');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $reservasi = Auth::reservasi();
            /*if ($reservasi->level == '1') {
                return redirect()->intended('admin');
            } elseif ($reservasi->level == '2') {
                return redirect()->intended('beranda');
            } */
            if ($reservasi) {
                return redirect()->intended('home');
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nama' => 'Maaf nama atau kode anda salah',
            'kode' => 'Maaf nama atau kode anda salah',
        ])->onlyInput('nama', 'kode');
    }
    // public function kasir(Request $request, $id)
    // {
    //     $order= Order::find($id);
    //     if ($order->status == 'acc') {
    //         $order = $request->all();
    //         order::where(['id' => $id])->update([
    //             'status' => $order['cancel'],
    //         ]);
    //     } elseif ($order->status == 'cancel') {
    //         $order = $request->all();
    //         order::where(['id' => $id])->update([
    //             'status' => $order['acc'],
    //         ]); 
    //     }
    //     return redirect()->back()->with('success', 'Data Successfully');
    // }
    public function order_on()
    {
        $t = SistemTampilan::all();
        $r = Reservasi::all();
        $user = User::all();
         $jumlah_pesanan = Reservasi::select('nama', 'status')->where('status', 'cancel')->orderBy('tgl', 'desc')->get()->count();
  
        return view('kasir.order_on', compact('r', 't','jumlah_pesanan','user'));
    }
    public function reservasi_hapus($id_booking)
    {
        $order = Reservasi::find($id_booking);
        $order->delete();
        return redirect()->back()->with('success', 'Data Success dihapus');
    }
    public function hapus_status($id)
    {
        // $kasir = Kasir::find($id);
        // $kasir->delete();
        //  $kasir = Order::find($id);
        // $kasir->delete();
        
        $result=Kasir::where('id_cart','=',$id)->delete();
        
        $result2=Order::where('id_cart','=',$id)->delete();
        
        
        
        return redirect()->back()->with('success', 'Data Success dihapus');;
    }
     public function data()
    {
        $k= Kasir::all();
        return view('kasir.data', compact('k'));
    }
}

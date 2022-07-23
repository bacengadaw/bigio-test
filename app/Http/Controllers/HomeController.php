<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNilaiRequest;
use App\Nilai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataNilai = Nilai::with('user')
        ->when(Auth::user()->hasRole('users'), function($q) {
            $q->where('user_id', Auth::user()->id);
        })->orderBy('created_at', 'asc')->paginate();

        $dataUser = User::get();
        return view('home', compact('dataNilai', 'dataUser'));
    }

    public function create(StoreNilaiRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataUser = User::find($request->user_id);
            $request['name'] = $dataUser->name;
            Nilai::create($request->all());
            DB::commit();
            return redirect('home')->with('success','Data berhasil ditambah');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function update(StoreNilaiRequest $request)
    {
        DB::beginTransaction();
        try {
            Nilai::updateOrCreate([
                'id' => $request->nilai_id
            ], [
                'name' => $request->name,
                'nilai' => $request->nilai
            ]);
            DB::commit();
            return redirect('home')->with('success','Data berhasil ditambah');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function delete($id)
    {
        try {
            $user= Nilai::find($id);
            $user->delete();
            return redirect('home')->with('success','Data berhasil dihapus');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

}

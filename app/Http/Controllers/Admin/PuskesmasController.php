<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PuskesmasRequest;
use App\Models\Opd;
use App\Models\Propinsi;
use App\Models\Puskesmas;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PuskesmasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:puskesmas-list|puskesmas-create|puskesmas-edit|puskesmas-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:puskesmas-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:puskesmas-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:puskesmas-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.puskesmas.index');
    }

    public function getData()
    {
        $items = Puskesmas::select(['puskesmas.id', 'puskesmas.created_at', 'puskesmas.nama', 'kecamatan.nama as kecamatan'])
            ->join('kecamatan', 'puskesmas.id_kecamatan', '=', 'kecamatan.id')
            ->orderBy('puskesmas.id','desc');

        return DataTables::of($items)
            ->addColumn('action', function ($row) {
                $btn = '<a href="/admin/puskesmas/' . $row->id . '/edit" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $row->id . "'" . ')" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
                return $btn;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? with(new Carbon($row->created_at))->format('m/d/Y') : '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Puskesmas();
        $propinsis = Propinsi::all();
        return view('pages.puskesmas.create', compact('item', 'propinsis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuskesmasRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);
        Puskesmas::create($data);
        session()->flash('success', 'Item was created.');
        return redirect()->route('puskesmas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Puskesmas::findOrFail($id);
        $propinsis = Propinsi::all();
        return view('pages.puskesmas.edit', compact('item', 'propinsis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PuskesmasRequest $request, $id)
    {
        $data = $request->all();
        $item = Puskesmas::findOrFail($id);
        $data['slug'] = Str::slug($request->nama);
        $item->update($data);
        session()->flash('success', 'Item was updated.');
        return redirect()->route('puskesmas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Puskesmas::findOrFail($id);
        $item->delete();
        return response()->json(['success' => 'Item deleted successfully']);
    }

    public function getList($id)
    {
        $items = Puskesmas::where('id_kecamatan', $id)->get();
        $html = '<option>Choose One</option>';
        foreach ($items as $item) {
            $html .= '<option value="' . $item->id  . '">' . $item->nama  . '</option>';
        }
        echo $html;
    }
}

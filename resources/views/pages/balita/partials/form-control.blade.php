<div class="card-body">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="id_propinsi">Propinsi</label>
        <select class="form-control select2" name="id_propinsi" style="width: 100%;">
            <option value="" selected disabled>Pilih satu</option>
            @foreach($propinsis as $propinsi)
            <option @if($item->id_propinsi == $propinsi->id || old('id_propinsi') == $propinsi->id) selected @endif value="{{ $propinsi->id }}">{{ $propinsi->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_kabupaten">Kabupaten</label>
        <select class="form-control select2" name="id_kabupaten" style="width: 100%;">
        </select>
    </div>
    <div class="form-group">
        <label for="id_kecamatan">Kecamatan</label>
        <select class="form-control select2" name="id_kecamatan" style="width: 100%;">
        </select>
    </div>
    <div class="form-group">
        <label for="id_kelurahan">Kelurahan</label>
        <select class="form-control select2" name="id_kelurahan" style="width: 100%;">
        </select>
    </div>
    <div class="form-group">
        <label for="id_puskesmas">Puskesmas</label>
        <select class="form-control select2" name="id_puskesmas" style="width: 100%;">
        </select>
    </div>
    <div class="form-group">
        <label for="posyandu">Posyandu</label>
        <input type="text" class="form-control" id="posyandu" name="posyandu" placeholder="posyandu" value="{{ old('posyandu') ?? $item->posyandu }}">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="rt">RT</label>
                <input type="text" class="form-control" id="rt" name="rt" placeholder="rt" value="{{ old('rt') ?? $item->rt }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="rw">RW</label>
                <input type="text" class="form-control" id="rw" name="rw" placeholder="rw" value="{{ old('rw') ?? $item->rw }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="{{ old('nik') ?? $item->nik }}">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ old('nama') ?? $item->nama }}">
    </div>
    <div class="form-group">
        <label for="jk">P/L</label>
        <input type="radio" id="jk" name="jk" value="P" {{ $item->jk == 'P' ? 'checked' : '' }} checked> Perempuan
        <input type="radio" id="jk" name="jk" value="L" {{ $item->jk == 'L' ? 'checked' : '' }}> Laki-laki
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="{{ old('alamat') ?? $item->alamat }}">
    </div>
    <div class="form-group">
        <label for="tgl_lahir">Tgl. Lahir</label>
        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="YYYY-MM-DD" value="{{ old('tgl_lahir') ?? $item->tgl_lahir }}">
    </div>
    <div class="form-group">
        <label for="bb_lahir">BB Lahir</label>
        <input type="text" class="form-control" id="bb_lahir" name="bb_lahir" placeholder="bb_lahir" value="{{ old('bb_lahir') ?? $item->bb_lahir }}">
    </div>
    <div class="form-group">
        <label for="tb_lahir">TB Lahir</label>
        <input type="text" class="form-control" id="tb_lahir" name="tb_lahir" placeholder="tb_lahir" value="{{ old('tb_lahir') ?? $item->tb_lahir }}">
    </div>
    <div class="form-group">
        <label for="nama_orang_tua">Nama Orang Tua</label>
        <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" placeholder="nama_orang_tua" value="{{ old('nama_orang_tua') ?? $item->nama_orang_tua }}">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>
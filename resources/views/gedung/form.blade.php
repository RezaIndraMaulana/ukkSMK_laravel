{{ csrf_field() }}

<div class="form-group">
    <label for="kode_gedung" class="col-sm-2 control-label">Kode Gedung</label>
    <div class="col-sm-10">
        <input type="text" name="kode_gedung" class="form-control" value="{{ $kode_gedung ?? '' }}">
    </div>
</div>
<div class="form-group">
    <label for="nama_gedung" class="col-sm-2 control-label">Nama Gedung</label>
    <div class="col-sm-10">
        <input type="text" name="nama_gedung" class="form-control" value="{{ $nama_gedung ?? '' }}">
    </div>
</div>
<div class="form-group">
    <label for="deskripsi_gedung" class="col-sm-2 control-label">Deskripsi Gedung</label>
    <div class="col-sm-10">
        <input type="text" name="deskripsi_gedung" class="form-control" value="{{ $deskripsi_gedung ?? '' }}">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route('gedung.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>

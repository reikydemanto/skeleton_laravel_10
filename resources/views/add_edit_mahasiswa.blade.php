<div class="container my-5">
    <h2 class="text-center mb-4">Form Data Mahasiswa</h2>
    <?php if (!empty(session('err_msg'))) { ?>
        <div class="text-center">
            <div class="alert alert-danger mx- mt-3" role="alert">
                {{ session('err_msg') }}
            </div>
        </div>
    <?php } ?>
    <form action="{{ empty($detail) ? url('add-mahasiswa/new') : url('edit_mahasiswa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" class="form-control" name="nrp" id="nrp" placeholder="Masukkan NRP" value="{{  ( !empty($detail) )  ? $detail[0]->nrp : '' }}" {{ ( !empty($detail) ) ? 'readonly' : '' }}>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ ( !empty($detail) ) ? $detail[0]->nama : '' }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ ( !empty($detail) ) ? $detail[0]->email : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
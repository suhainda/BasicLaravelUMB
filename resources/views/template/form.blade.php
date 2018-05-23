@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputText1" class="col-sm-2 control-label">Input Text 1</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText1" placeholder="Input Text 1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText2" class="col-sm-2 control-label">Input Text 2</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText2" placeholder="Input Text 2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="combobox1" class="col-sm-2 control-label">Combobox</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="combobox">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onclick="history.back(-1);">Kembali</button>
                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection